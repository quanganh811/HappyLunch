<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Merchant;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use Illuminate\Pagination\Paginator;

class ListMerchantController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::orderBy('created_at', 'DESC')->paginate(4);
        if ($search = request()->search) {
            $merchants = Merchant::orderBy('created_at', 'DESC')->where('name', 'like', '%' . $search . '%')->paginate(4);
        }
        return view('create-order.list-merchant')->with('merchants', $merchants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.merchant.create')->with('categories', $categories);;
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
            'name' => 'required|unique:merchants|max:191',
            'categories' => 'required|max:191',
            'type' => 'required|max:191',
            'link' => 'required|unique:merchants|max:191|url',
        ]);
        $merchant = new Merchant;
        $merchant->name = $request->get('name');
        $merchant->categories = $request->get('categories');
        $merchant->type = $request->get('type');
        $merchant->link = $request->get('link');
        $merchant->save();
        return redirect()->route('merchant.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merchant = Merchant::find($id);
        $categories = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.merchant.edit')->with('merchant', $merchant)->with('categories', $categories);
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
        $request->validate([
            'name' => 'required|max:191',
            'categories' => 'required|max:191',
            'type' => 'required|max:191',
            'link' => 'required|url|max:191',
        ]);
        $merchant = Merchant::find($id);
        $merchant->name = $request->get('name');
        $merchant->categories = $request->get('categories');
        $merchant->type = $request->get('type');
        $merchant->link = $request->get('link');
        $merchant->update();
        return redirect()->route('merchant.index')->with('success', 'Post created successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }

    public function destroy($id)
    {
        $merchant = Merchant::find($id);
        $merchant->delete();
        return redirect()->route('merchant.index');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Merchant::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Xoá thành công."]);
    }
}
