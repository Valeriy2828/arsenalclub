<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Arsenal</title>
<link href="{{ asset('assets/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!-- Custom Theme files -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RANGERS Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="{{ asset('assets/application/x-javascript') }}application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href="{{ asset('assets/http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic') }}"'http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <script src="{{ asset('assets/js/responsiveslides.min.js') }}"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
	
  </script>
<link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/ico">

 
<link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css"> 

 
<!--[if lt IE 9]>
    <script src="{{ asset('assets/js/respond-1.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/html5shiv.js') }}"></script>
    <script src="{{ asset('assets/js/html5element.js') }}"></script>
<![endif]--> 
</head>
<body>
	<!-- header-section-starts -->
	<div class="header">
		@include('site.header')
	</div>
	<!-- header-section-ends -->
		@yield('content')
		
		@include('site.footer')

<script type="text/javascript" src="{{ asset('assets/js/jquery-scrolltofixed.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.nav.js') }}"></script> 

<script type="text/javascript" src="{{ asset('assets/js/jquery.isotope.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/wow.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>

	

	