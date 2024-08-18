<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class PageController extends Controller
{

    public function index()
    {
        $data = Page::with('photo')->orderby('id','DESC')->get();
        return view('admin.page.index',compact('data'));
    }


    public function store(Request $request)
    {
        $data = new Page();
        $data->menu = $request->menu;
        $data->title = $request->title;
        $data->status = "0";
        $data->created_by = Auth::user()->id;
        if ($data->save()) {

            if ($request->image) {
                // $media= [];
                foreach ($request->image as $image) {
                    $rand = mt_rand(100000, 999999);
                    $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
                    //move image to postimages folder
                    $image->move(public_path() . '/images/page/', $name);
                    //insert into picture table
                    $pic = new Photo();
                    $pic->image = $name;
                    $pic->page_id = $data->id;
                    $pic->created_by = Auth::user()->id;
                    $pic->save();
                }
                
                $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Create Successfully.</b></div>";
                return response()->json(['status'=> 300,'message'=>$message]);
                
            }

        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Page::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request)
    {
        $data = Page::find($request->codeid);

            $data->menu = $request->menu;
            $data->title = $request->title;
            $data->status = "0";
            $data->updated_by = Auth::user()->id;

        if ($data->save()) {

            if ($request->image) {
                // $media= [];
                foreach ($request->image as $image) {
                    $rand = mt_rand(100000, 999999);
                    $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
                    //move image to postimages folder
                    $image->move(public_path() . '/images/page/', $name);
                    //insert into picture table
                    $pic = new Photo();
                    $pic->image = $name;
                    $pic->page_id = $data->id;
                    $pic->created_by = Auth::user()->id;
                    $pic->save();
                }
                
            }

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function delete($id)
    {
        if(Page::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }
}
