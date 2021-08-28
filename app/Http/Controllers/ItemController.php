<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Merchant;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $merchant = Merchant::find($id);
        $items = Item::where('merchant_id', $id)->orderBy('created_at', 'DESC')->paginate(10);
        if ($search = request()->search) {
            $items = Item::where('merchant_id', $id)->orderBy('created_at', 'DESC')->where('name', 'like', '%' . $search . '%')->paginate(10);
        }
        return view('admin.item.index')->with('items', $items)->with('merchant', $merchant);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $merchant = Merchant::find($id);
        return view('admin.item.create')->with('merchant', $merchant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'price' => 'required|max:191',
        ]);
        $item = new Item;
        $item->name = $request->get('name');
        $item->price = $request->get('price');
        $item->merchant_id = $request->get('merchant_id');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/item/', $filename);
            $item->image = $filename;
        }
        $item->save();
        return redirect('item/' . $request->merchant_id . '/index');
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
        $item = Item::find($id);
        $merchant = Merchant::find($item->merchant_id);
        return view('admin.item.edit')->with('items', $item)->with('merchant', $merchant);
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
        $request->validate([
            'name' => 'required|max:191',
            'price' => 'required|max:191',
        ]);
        $item = Item::find($id);
        $item->name = $request->get('name');
        $item->price = $request->get('price');
        $item->merchant_id = $request->get('merchant_id');
        if ($request->hasfile('image')) 
        {
            $destination = 'uploads/item/' . $item->image;
            if (File::exists($destination)) 
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/item/', $filename);
            $item->image = $filename;
        }
        $item->save();
        return redirect('item/' . $request->merchant_id . '/index');
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
        $item = Item::find($id);
        $destination = 'uploads/item/' . $item->image;
        File::delete($destination);
        $item->delete();
        return redirect('item/' . $item->merchant_id . '/index');
    }
}
