<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function __construct() {
        $this->middleware(['auth',"check:Slider Image"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('Slider Image')->show){
            return back();
        }
        $n['sliders'] = Slider::all();
        return view('backend.pages.slider.index', $n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Slider Image')->add){
            return back();
        }
        return view('backend.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!check('Slider Image')->add){
            return back();
        }

        $this->validate($request,[
            'img'=>'required',
        ],[],[
            'img' => "slider image",
        ]);

        $data = new Slider();

        $image = $request->img;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->img->move(public_path('slider'), $imagename);
            $data->image = 'slider/'.$imagename;
        }

        $data->status = $request->status;
        $data->save();
        return redirect()->route('slider.index')->with('success', 'Slider added successfully!');

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
        if(!check('Slider Image')->edit){
            return back();
        }

        $n['sliders'] = Slider::find($id);
        return view('backend.pages.slider.edit', $n);
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
        if(!check('Slider Image')->edit){
            return back();
        }

        $data = Slider::find($id);

        $images = $request->file('img');
        if($images){
            $image = $request->file('img');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->img->move(public_path('slider'), $imagename);
            if(file_exists($data->image)){
                unlink($data->image);
            }

            $data->image = 'slider/'.$imagename;
        }

        $data->status = $request->status;
        $data->save();
        return redirect()->route('slider.index')->with('success', 'Slider update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!check('Slider Image')->delete){
            return back();
        }

        $slider = Slider::find($id);
        if(file_exists($slider->image)){
            unlink($slider->image);
        }


        $slider->delete();
        return redirect()->back()->with('success', 'Slider image deleted successfully!');
    }
}
