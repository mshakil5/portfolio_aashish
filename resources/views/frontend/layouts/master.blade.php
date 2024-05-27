<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/front/assets/ico/favicon.png')}}">

    <title>Portfolio</title>

    <!-- Bootstrap core CSS -->
   
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/front/dist/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/front/css/navmenu-reveal.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/style.css')}}" rel="stylesheet">
    <!-- <link href="css/full-slider.css" rel="stylesheet"> -->
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
   
  <div class="bar">
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
    </button>
  </div>  
  @php
      $menus = \App\Models\Menu::with('category')->orderby('id','DESC')->get();
  @endphp
<div class="navmenu navmenu-default navmenu-fixed-left">
      
     <ul class="nav navmenu-nav">
        <li><a href="{{route('homepage')}}">Home</a></li>

        @foreach ($menus as $menu)

        {{-- <li><a href="#">{{$menu->name}}</a></li> --}}

        <ul class="nav navmenu-nav">
          <li><a class="" href="#">{{$menu->name}}    &raquo; </a>
            <ul class="nav navmenu-nav">
              @foreach ($menu->category as $cat)
                <li><a class="dropdown-item" href="{{route('gallery', $cat->id)}}">{{$cat->name}}</a></li>
              @endforeach
              
            </ul>
          </li>
        </ul>

        @endforeach
        
        <li><a href="{{route('about')}}">About</a></li>
        <li><a href="{{route('contact')}}">Contact</a></li>


        
        
      </ul>
      <a class="navmenu-brand" href="#"><img src="{{ asset('images/company/'.\App\Models\CompanyDetail::where('id',1)->first()->header_logo)}}" width="160"></a>


      
      
      

      {{-- <div class="social">
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-skype"></i></a>
      </div> --}}
      
</div>

        @yield('content')
      <!-- <div class="navbar navbar-default navbar-fixed-top">
        
      </div> -->

      <div class="container page-container">
        <div class="home-page-header">
         
         <!-- <div class="col-md-4 col-md-offset-4"><img src="img/zigzag.png" width="400" height="30"></div> -->
        </div>
        
      </div><!-- /.container -->
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('assets/front/dist/js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/front/js/main.js')}}"></script>
    <script>
    $('.carousel').carousel({
        interval: 6000 //changes the speed
    })
    </script>



    @yield('script')




  </body>
</html>
