

@extends('frontend.layouts.master')
@section('content')



{{-- <div class="canvas col-md-12">
  
  <div class="blog col-md-12   col-sm-12 col-xs-12">
    <div class="blog-post-single">
      
      <h3 class="blog-post-title text-center ">{{$data->title}}</h3>
       <span class="title-divider"></span>
      <img class="featured" src="{{asset('images/gallery/'.$data->image)}}" width="95%" alt="Background">
     <br>
      <p class="blog-text-single">
        {!! $data->description !!}
        
        
      </p>
    </div>
  </div>
</div> --}}

<div class="canvas col-md-12">
  
  <div class="blog col-md-12   col-sm-12 col-xs-12">
    <div class="blog-post-single">
      
      <div class="contact-bg col-md-8 col-sm-12">
        
        <p class="blog-post-sub-title text-center"> {{$data->title}} </p>
        <span class="title-divider"></span>
        @if ($data->link)
        <div class="blog-post-sub-title text-center">

          <iframe width="800" height="515" src="{{$data->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        </div>
        @else
        
        <img class="featured" src="{{asset('images/gallery/'.$data->image)}}" width="95%" alt="Background">
        
        @endif

        
    <h1 class="blog-post-title text-center">Have a look to my others work</h1>
    <span class="title-divider"></span>

        <div id="gallery-content">
          <div id="gallery-content-center" class="row gallery-content-center-full">
              @foreach ($cats as $item)
              <a class="col-md-4" href="{{route('galleryDetails', $item->id)}}"><img src="{{asset('images/gallery/'.$item->image)}}" class="img-responsive"></a>
              @endforeach
          </div>
        </div>
        

      </div>

      <div class="contact-bg col-md-3 col-sm-12 text-justify" style="margin-top: 50px">
        
        <p class="blog-text-single">

          {!! $data->description !!}
          
        </p>
      </div>



      


    </div>


    


  </div>


@endsection
@section('script')
@endsection

