<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\App;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use Illuminate\Pagination\Paginator;

class MerchantController extends Controller

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
        return view('admin.merchant.list')->with('merchants', $merchants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = App::orderBy('name', 'ASC')->select('id', 'name')->get();
        $categories = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.merchant.create')->with('categories', $categories)->with('types', $type);
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
            'category_id' => 'required|max:255',
            'app_id' => 'required|max:255',
            'link' => 'required|unique:merchants|max:191|url',
        ]);
        $merchant = new Merchant;
        $merchant->name = $request->get('name');
        $merchant->category_id = $request->get('category_id');
        $merchant->app_id = $request->get('app_id');
        $merchant->link = $request->get('link');
        $merchant->save();
        //return redirect()->route('')->with('success', 'Post created successfully.');
        return view('home');
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
        $merchant = Merchant::find($id);
        $type = App::orderBy('name', 'ASC')->select('id', 'name')->get();
        $categories = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.merchant.edit')->with('merchant', $merchant)->with('categories', $categories)->with('types', $type);
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
            'name' => 'required|max:255',
            'category_id' => 'required|max:191',
            'app_id' => 'required|max:191',
            'link' => 'required|url|max:191',
        ]);
        $merchant = Merchant::find($id);
        $merchant->name = $request->get('name');
        $merchant->category_id = $request->get('category_id');
        $merchant->app_id = $request->get('app_id');
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
