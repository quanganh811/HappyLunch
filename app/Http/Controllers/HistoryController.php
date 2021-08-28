<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Share;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Pagination\Paginator;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $orders = Order::select('orders.id', 'orders.master_id', 'orders.merchant_id', 'orders.total_fee', 'orders.shipping_fee', 'orders.updated_at')
            ->join('transactions', 'orders.id', '=', 'transactions.order_id')
            ->where('owner_id', $id)
            ->orWhere('master_id', $id)
            ->groupBy('orders.id')
            ->orderBy('orders.id', 'DESC')->paginate(3);
        switch($orders->count())
        {
            case 3:
                $transactions = Transaction::join('orders', 'orders.id', 'order_id')
                ->where('order_id', $orders[0]->id)
                ->orWhere('order_id', $orders[1]->id)
                ->orWhere('order_id', $orders[2]->id)
                ->get();
                break;
            case 2:
                $transactions = Transaction::join('orders', 'orders.id', 'order_id')
                ->where('order_id', $orders[0]->id)
                ->orWhere('order_id', $orders[1]->id)
                ->get();
                break;
            case 1:
                $transactions = Transaction::join('orders', 'orders.id', 'order_id')
                ->where('order_id', $orders[0]->id)
                ->get();
                break;
        } 
        return view('user.history')->with('transactions', $transactions)->with('orders', $orders);
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
        //
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
