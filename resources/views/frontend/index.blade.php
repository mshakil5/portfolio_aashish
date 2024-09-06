

@extends('frontend.layouts.master')
@section('content')

<nav class="navbar navbar-fixed-top navbar-light" style="margin-left: 260px">
  <div class="row">
    {{-- <img class="navbar-brand" src="{{asset('logo.png')}}" alt="logo" > --}}
    {{-- <ul class="nav navbar-nav">
      <li class="nav-item"><a href="#" class="nav-link">START</a></li>
    </ul> --}}

    <h3 class="sub-title-home">{{ \App\Models\CompanyDetail::where('id',1)->first()->company_name }}</h3>
  </div>
</nav>

{{-- <nav class="navbar navbar-expand-sm fixed-top navbar-light">
  <div class="container">
      <a class="navbar-brand" href="#">Brand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar1">
          <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
              </li>
          </ul>
          <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#">Link</a>
              </li>
          </ul>
      </div>
  </div>
</nav> --}}

<div id="myCarousel" class="canvas carousel slide" data-ride="carousel">
    <!-- Full Page Image Background Carousel Header -->

    <!-- Indicators -->
    <ol class="carousel-indicators xtra-border">
        @foreach (\App\Models\Slider::orderby('id','DESC')->get() as $key => $slider)
        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="@if ($key == 0) active @endif"></li>
        @endforeach
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner" role="listbox">

      @foreach (\App\Models\Slider::orderby('id','DESC')->get() as $key => $slider)
        <div class="item  @if ($key == 0) active @endif">
          <img src="{{asset('images/slider/'.$slider->image)}}" alt="First slide">
          <div class="carousel-caption">
            <h2 class="sub-title-home">{{$slider->title}}</h2>
            <h1 class="title-home">{{$slider->description}}</h1>
          </div>
        </div>
      @endforeach


        

        




    </div>
</div>
@endsection
@section('script')
@endsection

