<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n['ProductSize'] = ProductSize::all();
        return view('backend.pages.size.index', $n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'size' => 'required',
           'status' => 'required|in:active,inactive'
        ]);

        $data = new ProductSize();
        $data->size = $request->size;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('size.index')->with('success', 'Product size insert successfully!');
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
        $n['size'] = ProductSize::find($id);
        return view('backend.pages.size.edit', $n);
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
        $data = ProductSize::find($id);
        $data->size = $request->size;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('size.index')->with('success', 'Product size data update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProductSize::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Product delete data successfully!');
    }
}
