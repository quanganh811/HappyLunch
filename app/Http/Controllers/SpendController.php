<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class SpendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        //các khoản bị nợ
        $transactions1 = DB::table('transactions')
            ->select(DB::raw('owner_id, master_id, order_id, name, sum(item_price * quantity) as price, transactions.status'))
            ->join('orders', 'order_id', '=', 'orders.id')
            ->join('users', 'owner_id', '=', 'users.id')
            ->where('orders.master_id', $id)
            ->where('transactions.status', '<>', '0')
            ->groupBy('transactions.order_id', 'transactions.owner_id', 'transactions.status')
            ->paginate(3);
        //các khoản nợ
        $transactions2 = DB::table('transactions')
            ->select(DB::raw('owner_id, master_id, order_id, name, sum(item_price * quantity) as price, transactions.status'))
            ->join('orders', 'order_id', '=', 'orders.id')
            ->join('users', 'master_id', '=', 'users.id')
            ->where('owner_id', $id)
            ->where('transactions.status', '<>', '0')
            ->groupBy('transactions.order_id', 'transactions.owner_id', 'transactions.status')
            ->paginate(3);
        $total_money = 0;
        foreach ($transactions1 as $transaction) 
        {
            if ($transaction->status == 1) 
            {
                $total_money = $total_money + $transaction->price;
            }
        }
        foreach ($transactions2 as $transaction) 
        {
            if ($transaction->status == 1) 
            {
                $total_money = $total_money - $transaction->price;
            }
        }
        return view('user.spend')->with('transactions1', $transactions1)
            ->with('transactions2', $transactions2)
            ->with('total_money', $total_money);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner_id = $request->owner_id;
        $order_id = $request->order_id;
        $transactions = Transaction::where(['owner_id' => $owner_id, 'order_id' => $order_id])->get();
        foreach ($transactions as $transaction) 
        {
            $transaction->status = 2;
            $transaction->update();
        }
        return redirect()->route('spend.index')->with('success', 'Tạo thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
