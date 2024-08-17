<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactMail;
use App\Models\Gallery;
use App\Models\Page;
use Mail;
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

    public function gallery($catid, $mid)
    {
        // dd($catid, $mid);

        // $data = Category::with('gallery')->where('menu_id', $mid)->orderby('id','DESC')->get();
        $data = Gallery::where('category_id', $catid)->orderby('id','DESC')->get();
        // dd($data );
        return view('frontend.gallery',compact('data','catid'));
    }

    public function galleryDetails($id)
    {
        $data = Gallery::where('id',$id)->first();
        return view('frontend.gallery_detail',compact('data'));
    }

    public function newPages($id)
    {
        $data = Page::where('id',$id)->first();
        return view('frontend.page',compact('data'));
    }


    public function visitorContact(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $visitor_message = $request->message;

        $emailValidation = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,10}$/";

        if(empty($name)){
            return back()->with('error', 'Please fill name field, thank you!');
        }
        
        if(empty($email)){
            return back()->with('error', 'Please fill email field, thank you!');
        }

        if(!preg_match($emailValidation,$email)){
	    
            return back()->with('error', 'Your mail is not valid mail. Please wirite a valid mail, thank you!');

            
        }
        
        if(empty($visitor_message)){
            return back()->with('error', 'Please write your query in message field, thank you!');
            
        }

        $contactmail = ContactMail::where('id', 1)->first()->email;

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email; 
        $contact->message = $request->message; 
        if ($contact->save()) {

            $array['name'] = $request->name;
            $array['email'] = $request->email;
            $array['subject'] = "Contact Message Mail";
            $array['message'] = $request->message;
            $array['contactmail'] = $contactmail;
            
            Mail::to($contactmail)
            ->send(new ContactFormMail($array));
            
            return back()->with('success', 'Your message send successfully.');
        } else {
            return back()->with('error', 'An error occurred while creating the user.');
        }
    }

}
