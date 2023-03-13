<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GoogleTag;
use Illuminate\Http\Request;

class GoogleTagController extends Controller
{
    public function __construct() {
        $this->middleware(['auth',"check:Google tag"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('Google tag')->show){
            return back();
        }

        $n['google'] = GoogleTag::all();
        return view('backend.pages.google.index', $n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Google tag')->add){
            return back();
        }
        return view('backend.pages.google.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!check('Google tag')->add){
            return back();
        }


        $google = new GoogleTag();

        $google->gtag_header = $request->gtag_header;
        $google->gtag_footer = $request->gtag_footer;
        $google->status = $request->status;
        $google->save();
        return redirect()->route('google.index')->with('success', 'Google tag insert success!');
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
        if(!check('Google tag')->edit){
            return back();
        }
        $n['google'] = GoogleTag::find($id);
        return view('backend.pages.google.edit', $n);
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
        if(!check('Google tag')->edit){
            return back();
        }

     

        $google = GoogleTag::find($id);

        $google->gtag_header = $request->gtag_header;
        $google->gtag_footer = $request->gtag_footer;
        $google->status = $request->status;
        $google->save();
        return redirect()->route('google.index')->with('success', 'Google tag update success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!check('Google tag')->delete){
            return back();
        }

        $google = GoogleTag::find($id);

        $google->delete();
        return redirect()->back()->with('success', 'Google tag delete success!');
    }
}
