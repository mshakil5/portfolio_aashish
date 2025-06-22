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

    <title>{{ \App\Models\CompanyDetail::where('id',1)->first()->company_name }}</title>

    <!-- Bootstrap core CSS -->
   
    <link href="{{ asset('assets/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/front/dist/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/front/css/navmenu-reveal.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/style.css')}}" rel="stylesheet">
    <!-- <link href="css/full-slider.css" rel="stylesheet"> -->
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      .loading {
          z-index: 20;
          position: absolute;
          top: 0;
          left:-5px;
          width: 100%;
          height: 100%;
          background-color: rgba(0,0,0,0.4);
      }
      .loading-content {
          position: absolute;
          border: 16px solid #f3f3f3;
          border-top: 16px solid #3498db;
          border-radius: 50%;
          width: 50px;
          height: 50px;
          top: 40%;
          left:50%;
          animation: spin 2s linear infinite;
          }
            
          @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
          }

          .d-none {
            display: none !important;
          }
  </style>


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
      $pages = \App\Models\Page::orderby('id','DESC')->get();
      $category = \App\Models\Category::where('menu_id', 5)->orderby('id','DESC')->get();
      $motions = \App\Models\Category::where('menu_id', 6)->orderby('id','DESC')->get();

      // dd($menus);
  @endphp
<div class="navmenu navmenu-default navmenu-fixed-left">
      
     <ul class="nav navmenu-nav">
        <li><a href="{{route('homepage')}}">Home</a></li>

        @foreach ($category as $cats)
        <li><a href="{{route('gallery', ['mid' => $cats->menu_id, 'catid' => $cats->id ])}}">{{$cats->name}}</a></li>
        @endforeach

        @foreach ($motions as $motion)
        <li><a href="{{route('gallery', ['mid' => $motion->menu_id, 'catid' => $motion->id ])}}">{{$motion->name}}</a></li>
        @endforeach

        @foreach ($menus as $menu)

        <li class="nav-link d-none">
          <a href="#">{{$menu->name}}    &raquo;</a>
          <div class="subitem">
            @foreach ($menu->category as $cat)
            <a href="{{route('gallery', ['mid' => $menu->id, 'catid' => $cat->id ])}}">{{$cat->name}}</a>
            @endforeach
            
          </div>
        </li>

        @endforeach

        
        @foreach ($pages as $page)
        {{-- <li><a href="{{route('frontend.pages', $page->id)}}">{{$page->menu}}</a></li> --}}
        @endforeach
        


        <li><a href="{{route('projectStatement')}}">Project Statement</a></li>
        <li class="d-none"><a href="{{route('reporting')}}">Reporting</a></li>
        <li><a href="{{route('about')}}">Artist Bio</a></li>
        <li><a href="{{route('contact')}}">Contact</a></li>

        

      </ul>
      <a class="navmenu-brand" href="#"><img src="{{ asset('images/company/'.\App\Models\CompanyDetail::where('id',1)->first()->header_logo)}}" width="160"></a>
  
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

<script type="text/javascript">
  
  /*------------------------------------------
  --------------------------------------------
  Add Loading When fire Ajax Request
  --------------------------------------------
  --------------------------------------------*/
  $(document).ajaxStart(function() {
      $('#loading').addClass('loading');
      $('#loading-content').addClass('loading-content');
  });

  /*------------------------------------------
  --------------------------------------------
  Remove Loading When fire Ajax Request
  --------------------------------------------
  --------------------------------------------*/
  $(document).ajaxStop(function() {
      $('#loading').removeClass('loading');
      $('#loading-content').removeClass('loading-content');
  });
    
</script>

    @yield('script')




  </body>
</html>
