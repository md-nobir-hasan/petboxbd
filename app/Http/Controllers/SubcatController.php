<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcat;
use Illuminate\Http\Request;

class SubcatController extends Controller
{
    public function __construct() {
        $this->middleware(['auth',"check:Sub-category"]);
    }
   public function index()
    {
        if(!check('Sub-category')->show){
            return back();
        }
        $subcat=Subcat::where('status','active')->get();
        // return $subcat;
        return view('backend.pages.subcat.index')->with('subcats',$subcat);
    }

    public function create()
    {
        if(!check('Sub-category')->add){
            return back();
        }
         $n['cats']=Category::where('status','active')->get();
        return view('backend.pages.subcat.create',$n);
    }

     public function edit($id)
    {
        if(!check('Sub-category')->edit){
            return back();
        }
         $n['cats']=Category::where('status','active')->get();
         $n['subcat']=Subcat::find($id);
        return view('backend.pages.subcat.edit',$n);
    }

    public function store(Request $req){
        if(!check('Sub-category')->add){
            return back();
        }

        $submit = New Subcat();
        $submit->cat_id = $req->cat_id;
        $submit->title = $req->title;
        $submit->status = $req->status;
        if($req->file('img')){
            $file= $req->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('subcat'), $filename);

            $submit->img= 'subcat/'.$filename;
        }

        $status=$submit->save();
        if($status){
            request()->session()->flash('success','Sub-category successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('subcat.index');
    }

    public function update(Request $req){
        if(!check('Sub-category')->edit){
            return back();
        }

        $update =  Subcat::find($req->id);
        $update->cat_id = $req->cat_id;
        $update->title = $req->title;
        $update->status = $req->status;
        if($req->file('img')){
            $file= $req->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('subcat'), $filename);
            if(file_exists($update->img)){
                unlink($update->img);
            }

            $update->img= 'subcat/'.$filename;
        }

        $status=$update->save();
        if($status){
            request()->session()->flash('success','Sub-category successfully Updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('subcat.index');
    }

     public function destroy($id)
    {
        if(!check('Sub-category')->delete){
            return back();
        }

        $subcat=Subcat::findOrFail($id);
        if(file_exists($subcat->img)){
            unlink($subcat->img);
        }

        $subcat->delete();

        request()->session()->flash('success','Sub-category successfully deleted');
        return redirect()->route('subcat.index');
    }
}
