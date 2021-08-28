<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app = App::orderBy('created_at', 'DESC')->paginate(4);
        if ($search = request()->search) {
            $app = App::orderBy('created_at', 'DESC')->where('name', 'like', '%' . $search . '%')->paginate(4);
        }
        return view('admin.app.index')->with('apps', $app);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.app.create'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Hãy nhập loại quán',
            'name.unique' => 'Loại quán đã tồn tại',
        ];
        $request->validate([
            'name' => 'required|unique:apps',
        ], $messages);
        App::create($request->all());
        return redirect()->route('app.index')->with('success', 'Tạo thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\App  $App
     * @return \Illuminate\Http\Response
     */
    public function show(App $App)
    {
        return view('app.show', compact('app'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\App  $App
     * @return \Illuminate\Http\Response
     */
    public function edit(App $app)
    {
        return view('admin.app.edit', compact('app'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\App  $App
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, App $app)
    {
        $messages = [
            'name.required' => 'Hãy nhập loại quán',
            'name.unique' => 'Loại quán đã tồn tại',
        ];
        $request->validate([
            'name' => 'required|unique:apps',
        ], $messages);
        $app->update($request->all());
        return redirect()->route('app.index')->with('success', 'Cập nhật thành công ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\App  $App
     * @return \Illuminate\Http\Response
     */
    public function destroy(App $app)
    {
        $app->delete();
        return redirect()->route('app.index')
            ->with('success', 'Xóa thành công ');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        App::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Xoá thành công."]);
    }
}
