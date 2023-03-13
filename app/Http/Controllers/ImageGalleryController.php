<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ImageGalleryController extends Controller
{
    public function index(){

    }

    public function store(Request $req)
    {
        // dd($req->all());
        //validation
        //   $this->validate($req, [
        //     "session_id" => "required|exists:subject_assigns,session_id",
        //     "department_id" => "required|exists:subject_assigns,department_id",
        //     "semester_id" => "required|exists:subject_assigns,semester_id",
        //     "subject_id" => "required|exists:subject_assigns,subject_id",
        //     "shift_id" => "required|exists:teacher_assigns,shift_id",
        //     "group_id" => "required|exists:teacher_assigns,group_id",
        //     "teacher_id" => "required|exists:teachers,id",
        // ], [], [
        //     "session_id" => "Session",
        //     "department_id" => "Department",
        //     "semester_id" => "Semester",
        //     "subject_id" => "Subject",
        //     "shift_id" => "Shift",
        //     "group_id" => "Group",
        //     "teacher_id" => "Teacher"
        // ]);
        $insert = new ImageGallery();

        if ($req->user_id) {
            $insert = ImageGallery::find($req->user_id);
        }

        $insert->name = $req->name;
        $insert->email = $req->email;
        $insert->phone = $req->phone;
        $insert->address = $req->address;
        $insert->role_id = $req->role_id;
        $insert->password = Hash::make($req->password);
        $insert->save();

       return response()->json($insert);
    }
}
