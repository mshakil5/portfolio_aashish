<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\ContactMail;
use Illuminate\Support\Facades\Auth;

class ContactMailController extends Controller
{
    public function index()
    {
        $data = ContactMail::orderby('id','DESC')->get();
        return view('admin.contactMail.index', compact('data'));
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = ContactMail::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request)
    {


        $duplicatename = ContactMail::where('email',$request->email)->where('id','!=', $request->codeid)->first();
        if($duplicatename){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This emial already added.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }


        $data = ContactMail::find($request->codeid);
        $data->email = $request->email;
        $data->updated_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }
        else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        } 
    }

    public function getAllMessage()
    {
        $data = Contact::orderby('id','DESC')->get();
        return view('admin.contactMail.contact', compact('data'));
    }
}
