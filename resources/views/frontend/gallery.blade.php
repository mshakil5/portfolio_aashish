

@extends('frontend.layouts.master')
@section('content')

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/front/css/full-slider.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/Icomoon/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/front/css/animated-masonry-gallery.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/front/css/lightbox.css')}}" rel="stylesheet" type="text/css" />

<div class="canvas gallery"><br>
    <h1 class="blog-post-title text-center">Have a look to my works</h1>
    <span class="title-divider"></span>

  <div id="container" class="container">
    <div id="gallery">
      <div id="gallery-header">
        {{-- <div id="gallery-header-center">
          <div id="gallery-header-center-left">
            <!-- <div id="gallery-header-center-left-icon">
            </div> -->
            <div id="gallery-header-center-left-title">All Galleries</div>
          </div>
          <div id="gallery-header-center-right">
              <div class="gallery-header-center-right-links gallery-header-center-right-links-current" data-filter="*">All</div>
              @foreach ($data as $cat)
              <div class="gallery-header-center-right-links" data-filter=".{{$cat->name}}">{{$cat->name}}</div>
              @endforeach
          </div>
        </div> --}}
      </div>
        <div id="gallery-content">
          <div id="gallery-content-center" class="row gallery-content-center-full">


              @foreach ($data as $item)
                  
              <a class="col-md-4" href="{{route('galleryDetails', $item->id)}}"><img src="{{asset('images/gallery/'.$item->image)}}" class="img-responsive"></a>

              @endforeach
                  

          </div>
        </div>
  </div>
</div>
</div>

@endsection
@section('script')

    <script type="text/javascript" src="{{ asset('assets/front/js/isotope.js')}}"></script>
    <script src="{{ asset('assets/front/dist/js/jasny-bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/front/js/lightbox.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/animated-masonry-gallery.js')}}"></script>
@endsection
