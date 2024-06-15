

@extends('frontend.layouts.master')
@section('content')



<div class="canvas col-md-12">
  
  <div class="blog col-md-12   col-sm-12 col-xs-12">
    <div class="blog-post-single">
      
      <h3 class="blog-post-title text-center ">{{$data->title}}</h3>
       <span class="title-divider"></span>
      <img class="featured" src="{{asset('images/gallery/'.$data->image)}}" width="100%" alt="Background">
     <br>
      <p class="blog-text-single">
        {!! $data->description !!}
        
        
      </p>
    </div>
  </div>
  

</div>




@endsection
@section('script')
@endsection

