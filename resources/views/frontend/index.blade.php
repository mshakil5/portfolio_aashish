

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
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <!-- <div class="fill" style="background-image:url('img/bg.jpg');"></div> -->
            <img src="{{ asset('assets/front/img/bg.jpg')}}" alt="First slide">
            <div class="carousel-caption">
              <h2 class="sub-title-home">We Don't Take Photograph</h2>
              <h1 class="title-home">We Make It</h1>
            </div>
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <!-- <div class="fill" style="background-image:url('img/bg1.jpg');"></div> -->
            <img src="{{ asset('assets/front/img/bg1.jpg')}}" alt="Second slide">
            <div class="carousel-caption">
              <h2 class="sub-title-home">We Don't Take Photograph</h2>
              <h1 class="title-home">We Make It</h1>
            </div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <!-- <div class="fill" style="background-image:url('img/bg3.jpg');"></div> -->
            <img src="{{ asset('assets/front/img/bg3.jpg')}}" alt="Third slide">
            <div class="carousel-caption">
              <h2 class="sub-title-home">We Don't Take Photograph</h2>
              <h1 class="title-home">We Make It</h1>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection

