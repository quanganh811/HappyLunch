<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;


use App\Models\Share;
use Exception;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShareController extends Controller
{
    public function shareMoney($id)
    {

        try {

            DB::beginTransaction();
            $order = Order::find($id);
            $transaction_owners = Transaction::select('owner_id')
                ->where('order_id', $id)
                ->distinct()
                ->get();
            $count_owner = $transaction_owners->count();
            $ship = $order->shipping_fee / $count_owner;
            if ($order->status == 0) {
                $order->status = 1;
                $order->save();
                DB::update('update transactions set status = 1 where order_id = ?', [$id]);

                foreach ($transaction_owners as $transaction_owner) {
                    $transaction = new Transaction();
                    $transaction->owner_id = $transaction_owner->owner_id;
                    $transaction->item_id = 0;
                    $transaction->order_id = $id;
                    $transaction->item_name = "ship";
                    $transaction->item_price = $ship;
                    $transaction->quantity = 1;
                    $transaction->status = 1;
                    $transaction->save();
                }
            }
            $transaction_shares = DB::table('transactions')
                ->select(DB::raw('owner_id,users.name as name,users.image as image, sum(item_price*quantity)as share'))
                ->join('users', 'owner_id', '=', 'users.id')
                ->where('order_id', $id)
                ->groupBy('owner_id')
                ->get();

            DB::commit();
        } catch (Exception $Ex) {
            DB::rollBack();
            //return back();
        }
        return view('order.share')
            ->with('order', $order)
            ->with('transaction_owners', $transaction_owners)
            ->with('transaction_shares', $transaction_shares);
    }
}
