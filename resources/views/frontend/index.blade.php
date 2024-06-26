

@extends('frontend.layouts.master')
@section('content')
<div id="myCarousel" class="canvas carousel slide" data-ride="carousel">
    <!-- Full Page Image Background Carousel Header -->

    <!-- Indicators -->
    <ol class="carousel-indicators xtra-border">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
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

