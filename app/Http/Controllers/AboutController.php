<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\support\Facades\Auth;

class AboutController extends Controller
{

    public function index()
    {
        $data = About::orderby('id','DESC')->first();
        return view('admin.about.index',compact('data'));
    }


    public function store(Request $request)
    {
        $data = new About();
        $data->title = $request->title;
        $data->big_title = $request->big_title;
        $data->description = $request->description;

        // image
        if ($request->image != 'null') {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images/about'), $imageName);
            $data->image = $imageName;
        }
        // end

        $data->status = "0";
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = About::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request)
    {
        $data = About::find($request->codeid);

        
        $data->title = $request->title;
        $data->big_title = $request->big_title;
        $data->description = $request->description;

        // image
        if ($request->image != 'null') {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images/about'), $imageName);
            $data->image = $imageName;
        }
        // end
            $data->status = "0";
            $data->updated_by = Auth::user()->id;

        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    
}
