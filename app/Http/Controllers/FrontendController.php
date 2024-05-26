<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Gallery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
        // return view('auth.login');
    }
    public function about()
    {
        $data = About::orderby('id','DESC')->first();
        return view('frontend.about',compact('data'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function gallery($id)
    {
        $data = Gallery::orderby('id','DESC')->first();
        return view('frontend.gallery',compact('data'));
    }


}
