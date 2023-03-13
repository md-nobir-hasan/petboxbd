<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Coupon;

class ShippingController extends Controller
{

    public function __construct() {
        $this->middleware(['auth',"check:Shipping"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('Shipping')->show){
            return back();
        }

        $shipping=Shipping::orderBy('id','DESC')->paginate(10);
        return view('backend.pages.shipping.index')->with('shippings',$shipping);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Shipping')->add){
            return back();
        }

        return view('backend.pages.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!check('Shipping')->add){
            return back();
        }

        $this->validate($request,[
            'type'=>'string|required',
            'price'=>'nullable|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        // return $data;
        $status=Shipping::create($data);
        if($status){
            request()->session()->flash('success','Shipping successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('shipping.index');
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
        if(!check('Shipping')->edit){
            return back();
        }

        $shipping=Shipping::find($id);
        if(!$shipping){
            request()->session()->flash('error','Shipping not found');
        }
        return view('backend.pages.shipping.edit')->with('shipping',$shipping);
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
        if(!check('Shipping')->edit){
            return back();
        }

        $shipping=Shipping::find($id);
        $this->validate($request,[
            'type'=>'string|required',
            'price'=>'nullable|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        // return $data;
        $status=$shipping->fill($data)->save();
        if($status){
            request()->session()->flash('success','Shipping successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('shipping.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!check('Shipping')->delete){
            return back();
        }

        $shipping=Shipping::find($id);
        if($shipping){
            $status=$shipping->delete();
            if($status){
                request()->session()->flash('success','Shipping successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('shipping.index');
        }
        else{
            request()->session()->flash('error','Shipping not found');
            return redirect()->back();
        }
    }
}
