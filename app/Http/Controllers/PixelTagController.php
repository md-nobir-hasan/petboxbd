<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PixelTag;
use Illuminate\Http\Request;

class PixelTagController extends Controller
{
    public function __construct() {
        $this->middleware(['auth',"check:Pixel tag"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('Pixel tag')->show){
            return back();
        }
        $n['pixel'] = PixelTag::all();
        return view('backend.pages.pixel.index', $n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Pixel tag')->add){
            return back();
        }

        return view('backend.pages.pixel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!check('Pixel tag')->add){
            return back();
        }


        $pixel = new PixelTag();
        $pixel->ptag_header = $request->ptag_header;
        $pixel->ptag_footer = $request->ptag_footer;
        $pixel->status = $request->status;
        $pixel->save();

        return redirect()->route('pixel.index')->with('success', 'Pixel tag insert success!');
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
        if(!check('Pixel tag')->edit){
            return back();
        }
        $n['pixel'] = PixelTag::find($id);
        return view('backend.pages.pixel.edit', $n);
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
        if(!check('Pixel tag')->edit){
            return back();
        }

        $pixel = PixelTag::find($id);
        $pixel->ptag_header = $request->ptag_header;
        $pixel->ptag_footer = $request->ptag_footer;
        $pixel->status = $request->status;
        $pixel->save();

        return redirect()->route('pixel.index')->with('success', 'Pixel tag update success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!check('Pixel tag')->delete){
            return back();
        }
        $pixel = PixelTag::find($id);

        $pixel->delete();
        return redirect()->back()->with('success', 'Pixel tag delete success!');
    }
}
