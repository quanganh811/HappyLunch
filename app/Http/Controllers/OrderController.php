<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $transactions = Transaction::where('order_id', $id)->paginate(6);
        $order = Order::find($id);
        return view('order.index')->with('transactions', $transactions)->with('order', $order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hash = md5(now()->timestamp);
        $link = url("/order/{$hash}");
        $merchants = Merchant::orderBy('name', 'ASC')->select('id', 'name',)->get();
        return view('order.create')->with('merchants', $merchants)->with('link', $link);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'shipping_fee.required' => 'Bạn chưa nhập phí ship'
        ];
        $request->validate([
            'shipping_fee' => 'required'
        ], $message);
        $order = new Order();
        $order->master_id = Auth::user()->id;
        $order->merchant_id = $request->get('merchant_id');
        $order->link = $request->get('link');
        $order->shipping_fee = $request->get('shipping_fee');
        $order->status = false;
        $order->save();
        return redirect('order/' . $order->id . '/index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // $transaction = Transaction::find($id);
        // $transaction->delete();
        // return redirect()->route('order.index');   
    }

    public function destroyTransaction($order_id, $transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        $transaction->delete();
        return redirect('order/' . $order_id . '/index');
    }
}
