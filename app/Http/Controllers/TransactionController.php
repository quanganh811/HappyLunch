<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::debug($request->link);
        if (!$order = Order::where('link', $request->link)->first()) {
            echo '<script type="text/javascript">alert("Liên kết bị lỗi. Hãy nhập lại!");</script>';
            return view('home');
        }
        $order = Order::where('link', $request->link)->first();
        if ($order->status == '1') {
            echo '<script type="text/javascript">alert("Đơn hàng đã được đặt. Hãy nhập lại!");</script>';
            return view('home');
        }
        $merchant = Merchant::find($order->merchant_id);
        $items = Item::where('merchant_id', $order->merchant_id)->orderBy('created_at', 'DESC')->paginate(6);
        $items->withPath('item-merchant?_token=' . $request->_token . '&link=' . $request->link);
        if ($search = request()->search) {
            $items = Item::where('merchant_id', $order->merchant_id)->orderBy('created_at', 'DESC')->where('name', 'like', '%' . $search . '%')->paginate(10);
        }
        return view('item-merchant')->with('items', $items)->with('merchant', $merchant)->with('order', $order);
    }

    public function sendMessage()
    {
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data['title'] = Auth::user()->name;
        $data['content'] = 'Đã tạo đơn mới, hãy load lại đơn';
        $data['avatar'] = Auth::user()->image;
        $data['time'] = $mytime->toDateTimeString();

        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        $pusher = new Pusher(
            'cdc0bda79ea9156d5a97',
            '5520540a48c015be7818',
            '1254747',
            $options
        );

        $pusher->trigger('Notify', 'send-message', $data);
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
        $itemids = $request->id;
        foreach ($itemids as $itemid) {
            $transaction = new Transaction;
            $transaction->owner_id = Auth::user()->id;
            $transaction->order_id = $request->get('order_id');
            $transaction->item_id = $itemid;
            $transaction->item_name = $request->item_name[$itemid];
            $transaction->item_price = $request->item_price[$itemid];
            $transaction->quantity = $request->quantity[$itemid];
            $transaction->save();
        }
        $this->sendMessage();
        return redirect('order/' . $request->order_id . '/index');
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
        $item = Item::find($id);
        $item->delete();
        return $this->index($item->merchant_id);
    }
}
