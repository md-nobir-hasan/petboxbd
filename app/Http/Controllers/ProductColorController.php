<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('Product')->show){
            return back();
        }

        $n['product_color'] = ProductColor::all();
        return view('backend.pages.color.index', $n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Product')->add){
            return back();
        }

        return view('backend.pages.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!check('Product')->add){
            return back();
        }

        $this->validate($request, [
            'c_name' => 'required',
            'c_code' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $data = new ProductColor();
        $data->c_name = $request->c_name;
        $data->c_code = $request->c_code;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('color.index')->with('success', 'Product color added successfully!');
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
        if(!check('Product')->edit){
            return back();
        }

        $n['color'] = ProductColor::find($id);
        return view('backend.pages.color.edit', $n);
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
        if(!check('Product')->edit){
            return back();
        }

        $data = ProductColor::find($id);
        $data->c_name = $request->c_name;
        $data->c_code = $request->c_code;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('color.index')->with('success', 'Product color update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!check('Product')->delete){
            return back();
        }

        $data = ProductColor::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Product color deleted successfully!');
    }
}
