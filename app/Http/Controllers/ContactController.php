<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct() {
        $this->middleware(['auth',"check:Customer Contact"]);
    }

    public function contact(Request $request){
        if(!check('Customer Contact')->add){
            return back();
        }

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->district = $request->district;
        $contact->message  = $request->message;

        $contact->save();
        return redirect()->back()->with('message', 'We appreciate you contacting our company. One of our colleagues will get back in touch with you soon!');
    }

    public function customer(){
        if(!check('Customer Contact')->show){
            return back();
        }

        $n['customers'] = Contact::all();
        return view('backend.pages.customer.customer', $n);
    }

    public function view($id){
        if(!check('Customer Contact')->edit){
            return back();
        }

        $n['customer'] = Contact::find($id);
        return view('backend.pages.customer.customer-view', $n);
    }

    public function delete($id){
        if(!check('Customer Contact')->delete){
            return back();
        }

        $n['customer'] = Contact::find($id);
        $n['customer']->delete();
        return redirect()->back()->with('message', 'Customer details deleted success!');
    }

}
