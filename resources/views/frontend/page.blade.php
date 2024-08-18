

@extends('frontend.layouts.master')
@section('content')

<link href="{{ asset('assets/front/css/lightbox.css')}}" rel="stylesheet" type="text/css" />


<div class="canvas col-md-12">
  <div class="blog col-md-12   col-sm-12 col-xs-12">
    <div class="blog-post-single">
      
      <h3 class="blog-post-title text-center ">{{$data->title}}</h3>
    </div>

    <div id="container" class="container">
      <div id="gallery">
        <div id="gallery-content">
          <div id="gallery-content-center" class="row gallery-content-center-full">
    
    
            {{-- <a class="col-md-4 action" href="assets/studio1.jpg" data-lightbox="studio1"><img src="assets/studio1.jpg" class="img-responsive"></a> --}}
            @foreach ($data->photo as $key => $image)
              <a class="col-md-4" href="{{asset('images/page/'.$image->image)}}" data-lightbox="studio1">
                <img src="{{asset('images/page/'.$image->image)}}" class="img-responsive"></a>
            @endforeach
            
            
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>








@endsection
@section('script')

<script src="{{ asset('assets/front/js/lightbox.js')}}"></script>
@endsection

