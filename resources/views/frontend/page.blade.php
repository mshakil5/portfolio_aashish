

@extends('frontend.layouts.master')
@section('content')



{{-- <div class="canvas col-md-12">
  
  <div class="blog col-md-12   col-sm-12 col-xs-12">
    <div class="blog-post-single">
      
      <h3 class="blog-post-title text-center ">{{$data->title}}</h3>
       <span class="title-divider"></span>
      <img class="featured" src="{{asset('images/page/'.$data->image)}}" width="100%" alt="Background">
     <br>
      <p class="blog-text-single">
        {!! $data->description !!}
        
        
      </p>
    </div>
  </div>
  

</div> --}}

<div id="container" class="container">
  <div id="gallery">
    <div id="gallery-header">
      <div id="gallery-header-center">
        <div id="gallery-header-center-left">
          <!-- <div id="gallery-header-center-left-icon">
          </div> -->
          <div id="gallery-header-center-left-title">{{$data->title}}</div>
        </div>
        
      </div>
    </div>
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




@endsection
@section('script')
@endsection

