<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\ProductGallery;
use App\Models\Subcat;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class AjaxController extends Controller
{
    public function ajaxFetch(Request $req){
        return response()->json(Payment::find($req->id));
    }

    public function index(Request $req){
        $model = '\\App\\Models\\'.$req->model;
        $id = (int)$req->data_obj['id'];
        $data = $model::with($req->with_arr)->find($id);
        return response()->json($data);
    }


    public function store(Request $req){
        // return response()->json($req->all());
        $insert = new ProductGallery();
        $insert->color_id = $req->color_id;
        $insert->size_id = $req->size_id;

        if($req->file('galleryphoto')){
            $file= $req->file('galleryphoto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('product-gallery'), $filename);
            $path = 'product-gallery/'.$filename;
            $imge_gallery = new ImageGallery();
            $imge_gallery->img = $path;
            $imge_gallery->to = 'product';
            $imge_gallery->save();
            $insert->gallery_id = $imge_gallery->id;
        }

        $insert->save();
        $n['insert'] = $insert;
        $n['img'] = asset($path);
        return response()->json($n);
    }


    public function singleStore(Request $req){
        $insert = '\\App\\Models\\'.$req->model;
        $data = $insert::create($req->data_obj);
        return response()->json($data);
    }



    public function delete(Request $req){
        $model = '\\App\\Models\\'.$req->model;
        $id = (int)$req->data_obj['id'];
        $delete = $model::find($id);

        if($delete->gallery_id){
           $gallery_delete = ImageGallery::find($delete->gallery_id);

            if($gallery_delete){
                if(file_exists($gallery_delete->img)){
                    unlink($gallery_delete->img);
                }
                $gallery_delete->delete();
            }
        }

       $delete = $delete->delete();
        return response()->json($delete);
    }

    public function subcatFetch(Request $req){
        return Subcat::where('cat_id',$req->id)->orderBy('id','desc')->get();
    }
}
