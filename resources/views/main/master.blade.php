<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/bootstrap/css/bootstrap.min.css')}}">
	
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/jquery.Jcrop.css')}}">

    <script type="text/javascript" src="{{asset('frontend/assets/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.Jcrop.js')}}"></script>
	<script src="{{asset('frontend/assets/js/jcrop_bits.js')}}"></script>
	<script src="{{asset('frontend/assets/js/main.js')}}"></script>

   <title>Social APP</title>
	
</head>
<body>
	
  @include('main.nav')

   @yield('content')





<script src="{{asset('frontend/assets/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>
</html>

