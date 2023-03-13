<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderStatus;

class OrderStatusController extends Controller
{
    public function __construct() {
        $this->middleware(['auth',"check:Order Status"]);
    }

    public function index(){
        if(!check('Order Status')->show){
            return back();
        }

        $n['minfo'] = OrderStatus::where('status','active')->get();
        return view('backend.pages.order_status.index',$n);
    }

    public function create(){
        if(!check('Order Status')->add){
            return back();
        }

        return view('backend.pages.order_status.create');
    }

    public function store(Request $req){
        if(!check('Order Status')->add){
            return back();
        }

        $insert = new OrderStatus;
        $insert->name = $req->name;
        $insert->status = $req->status;
       $status =  $insert->save();
        if($status){
            request()->session()->flash('success','Shipping successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('order-status.index');
    }

    public function edit($id){
        if(!check('Order Status')->edit){
            return back();
        }

        $n['minfo'] = OrderStatus::find($id);
        return view('backend.pages.order_status.edit',$n);
    }

    public function update(Request $req){
        if(!check('Order Status')->edit){
            return back();
        }

        // dd($req->all());
        $update = OrderStatus::find($req->id);
        $update->name = $req->name;
        $update->status = $req->status;
        $status = $update->save();
        if($status){
            request()->session()->flash('success','Shipping successfully Updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('order-status.index');

    }

    public function destroy($id){
        if(!check('Order Status')->delete){
            return back();
        }

         $delete = OrderStatus::find($id);
        $status =  $delete->delete();
        if($status){
            request()->session()->flash('success','Shipping successfully deleted');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('order-status.index');
    }

    public function ajax(){
        $n['minfo'] = OrderStatus::where('status','active')->get();
        // $n['shipping'] = Shipping::all();
        return view('backend.pages.order_status.ajax-body',$n);
    }
    public function OrderStatusAssign(){
        $name = $_GET['name'];
        $order_id = $_GET['order_id'];
        $order_status_update = Order::find($order_id);
        $order_status_update->order_status = $name;
        $msg = $order_status_update->save();

        if($msg){
            $msg= $name;
        }else{
            $msg=0;
        }
        return $msg;
    }
}
