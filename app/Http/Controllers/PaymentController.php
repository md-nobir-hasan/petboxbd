<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware(['auth',"check:Payment System"]);
    }
    // All payment data show page
    public function index(){
            if(!check('Payment System')->show){
                return back();
            }
        $payment = Payment::all();
        return view('backend.pages.payment.index', compact('payment'));
    }

    // Insert payment data page show
    public function create(){
        if(!check('Payment System')->add){
            return back();
        }
        return view('backend.pages.payment.create');
    }

    // Insert payment data
    public function insert(Request $request){
        if(!check('Payment System')->add){
            return back();
        }
        $request->validate([
            'payment' => 'required',
            'status' => 'required',
        ]);

        $payment = new Payment();

        $payment->payment = $request->payment;
        $payment->description = $request->description;
        $payment->status = $request->status;

        $payment->save();
        return redirect()->route('payment.index')->with('message', 'Payment system added successfully!');
    }

    // Payment system data delete
    public function payment_delete($id){
        if(!check('Payment System')->delete){
            return back();
        }
        $payment = Payment::find($id);

        $payment->delete();
        return redirect()->back()->with('message', 'Payment system data deleted successfully!');
    }

    public function edite($id){
        if(!check('Payment System')->edit){
            return back();
        }

        $payment = Payment::find($id);
        return view('backend.pages.payment.edite', compact('payment'));

    }

    public function update(Request $request, $id){
        if(!check('Payment System')->edit){
             return back();
        }
        $payment = Payment::find($id);

        $payment->payment = $request->payment;
        $payment->description = $request->description;
        $payment->status = $request->status;

        $payment->save();
        return redirect()->route('payment.index')->with('message', 'Payment system update successfully!');
    }
}
