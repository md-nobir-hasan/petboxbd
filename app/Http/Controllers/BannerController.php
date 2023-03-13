<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() {
        $this->middleware(['auth',"check:Banner Image"]);
    }

    public function index()
    {
        if(!check('Banner Image')->show){
            return back();
        }

        $n['banners'] = Banner::all();
        return view('backend.pages.banner.index', $n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Banner Image')->add){
            return back();
        }

        return view('backend.pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!check('Banner Image')->add){
            return back();
        }

        $this->validate($request,[
            'img'=>'required',
        ],[],[
            'img' => "banner image",
        ]);

        $data = new Banner();

        $image = $request->img;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->img->move(public_path('banner'), $imagename);
            $data->image = 'banner/'.$imagename;
        }

        $data->status = $request->status;
        $data->save();
        return redirect()->route('banner.index')->with('success', 'Banner added successfully!');
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
        if(!check('Banner Image')->edit){
            return back();
        }

        $n['banners'] = Banner::find($id);
        return view('backend.pages.banner.edit', $n);
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
        if(!check('Banner Image')->edit){
            return back();
        }

        $data = Banner::find($id);

        $images = $request->file('img');
        if($images){
            $image = $request->file('img');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->img->move(public_path('banner'), $imagename);
            if(file_exists($data->image)){
                unlink($data->image);
            }

            $data->image = 'banner/'.$imagename;
        }

        $data->status = $request->status;
        $data->save();
        return redirect()->route('banner.index')->with('success', 'Banner update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!check('Banner Image')->delete){
            return back();
        }

        $banner = Banner::find($id);
        if(file_exists($banner->image)){
            unlink($banner->image);
        }

        $banner->delete();
        return redirect()->back()->with('success', 'Banner image delete successfully!');
    }
}
