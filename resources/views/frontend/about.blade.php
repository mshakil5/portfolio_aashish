

@extends('frontend.layouts.master')
@section('content')



<div class="canvas col-md-12">

  <div class="container">
    <div class="blog col-md-12   col-sm-12 col-xs-12">
      <div class="blog-post-single">
        
        <div class="contact-bg col-md-7 col-sm-12 text-justify">
          
          <h3 class="blog-post-title text-center ">{{$data->title}} </h3>
          <p class="blog-post-sub-title text-center"> {{$data->big_title}} </p>
          <span class="title-divider"></span>
          {!! $data->description !!}
        </div>
  
        <div class="col-md-5 col-sm-12 text-justify">
          
          <img class="featured" src="{{asset('images/about/'.$data->image)}}" width="100%" alt="Background">
          {{-- <div class="">
            <p class="blog-text-single">
              
            </p>
          </div> --}}
        </div>
  
  
  
  
      </div>
    </div>
  </div>
  


  {{-- <div class=" col-md-3 col-sm-12 col-xs-12 page-container sidebar visible-xs visible-sm">
    <div class="home-page-header1">
     <div class="blog-post">
     <h4 class="sidebar-title">About Us</h4>
     <p class="blog-text">
        You know, being a test pilot isn't always the healthiest business in the world.
        That's one small step for [a] man, one giant leap for mankind.
      </p>
      <img class="featured" src="{{ asset('assets/front/img/dolon.png')}}" width="300" alt="Background">
    </div>
    </div>
  </div> --}}
  

</div>




@endsection
@section('script')
@endsection

