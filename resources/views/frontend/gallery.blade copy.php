

@extends('frontend.layouts.master')
@section('content')

<style>
  .container.gallery-container {
    background-color: #fff;
    color: #35373a;
    min-height: 100vh;
    padding: 30px 50px;
  }

  .gallery-container h1 {
      text-align: center;
      margin-top: 50px;
      font-family: 'Droid Sans', sans-serif;
      font-weight: bold;
  }

  .gallery-container p.page-description {
      text-align: center;
      margin: 25px auto;
      font-size: 18px;
      color: #999;
  }

  .tz-gallery {
      padding: 40px;
  }

  /* Override bootstrap column paddings */
  .tz-gallery .row > div {
      padding: 2px;
  }

  .tz-gallery .lightbox img {
      width: 100%;
      border-radius: 0;
      position: relative;
  }

  .tz-gallery .lightbox:before {
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: -13px;
      margin-left: -13px;
      opacity: 0;
      color: #fff;
      font-size: 26px;
      font-family: 'Glyphicons Halflings';
      content: '\e003';
      pointer-events: none;
      z-index: 9000;
      transition: 0.4s;
  }


  .tz-gallery .lightbox:after {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      background-color: rgba(46, 132, 206, 0.7);
      content: '';
      transition: 0.4s;
  }

  .tz-gallery .lightbox:hover:after,
  .tz-gallery .lightbox:hover:before {
      opacity: 1;
  }

  .baguetteBox-button {
      background-color: transparent !important;
  }

  @media(max-width: 768px) {
      body {
          padding: 0;
      }
  }
</style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">


<div class="canvas gallery"><br>
    {{-- <h1 class="blog-post-title text-center">Have a look to my works</h1> --}}
    <span class="title-divider"></span>

  <div id="container" class="">
    <div id="gallery">
      <div id="gallery-header">
        <div id="gallery-header-center " style="display: none;">
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
        </div>
      </div>
        <div id="gallery-content" style="display: none;">
          <div id="gallery-content-center" class="row gallery-content-center-full">


              @foreach ($data as $item)
                  
              <a class="col-md-4" href="{{route('galleryDetails', $item->id)}}"><img src="{{asset('images/gallery/'.$item->image)}}" class="img-responsive"></a>

              @endforeach
                  

          </div>
        </div>


        <div class="tz-gallery">

          <div class="row">
  
              <div class="col-sm-12 col-md-4">
                  <a class="lightbox" href="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/bridge.jpg">
                      <img src="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/bridge.jpg" alt="Bridge">
                  </a>
              </div>
              <div class="col-sm-6 col-md-4">
                  <a class="lightbox" href="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/park.jpg">
                      <img src="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/park.jpg" alt="Park">
                  </a>
              </div>
              <div class="col-sm-6 col-md-4">
                  <a class="lightbox" href="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/tunnel.jpg">
                      <img src="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/tunnel.jpg" alt="Tunnel">
                  </a>
              </div>
              <div class="col-sm-12 col-md-8">
                  <a class="lightbox" href="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/traffic.jpg">
                      <img src="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/traffic.jpg" alt="Traffic">
                  </a>
              </div>
              <div class="col-sm-6 col-md-4">
                  <a class="lightbox" href="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/rails.jpg">
                      <img src="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/rails.jpg" alt="Coast">
                  </a>
              </div> 
              <div class="col-sm-6 col-md-4">
                  <a class="lightbox" href="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/coast.jpg">
                      <img src="https://raw.githubusercontent.com/LeshikJanz/libraries/master/Related%20images/Bootstrap%20example/coast.jpg" alt="Rails">
                  </a>
              </div>
  
          </div>
  
      </div>


  </div>
</div>
</div>

@endsection
@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>

@endsection

