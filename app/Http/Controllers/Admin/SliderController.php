<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::orderby('id','DESC')->get();
        return view('admin.slider.index', compact('data'));
    }

    public function store(Request $request)
    {
        if($request->image == 'null'){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Image \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        
        $data = new Slider;
        $data->title = $request->title;
        $data->description = $request->description;

        // image
        if ($request->image != 'null') {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images/slider'), $imageName);
            $data->image = $imageName;
        }
        // end


        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Create Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Slider::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request)
    {

        
        if($request->image == 'null'){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \" Image \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        
        $data = Slider::find($request->codeid);
        $data->title = $request->title;
        $data->description = $request->description;
        // image
        if ($request->image != 'null') {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images/slider'), $imageName);
            $data->image = $imageName;
        }
        // end
        $data->updated_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }
        else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        } 
    }

    public function delete($id)
    {

        if(Slider::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Data has been deleted successfully']);
        }else{
            return response()->json(['success'=>false,'message'=>'Delete Failed']);
        }
    }
}
