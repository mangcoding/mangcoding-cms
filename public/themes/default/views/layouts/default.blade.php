<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8"/>
	<title>@yield('title')</title>
	<meta name="Keywords" content="@yield('keywords')">
	<meta name="Description" content="@yield('description')">

    <!-- Bootstrap -->
    @section('head')
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	<link href="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400,700%3Alatin%7CMontserrat%3A700%3Alatin"/>
	<link href="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/css/style.css') }}" rel="stylesheet" />
	<link href="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/font-awesome-4.5.0/css/font-awesome.css') }}" rel="stylesheet" />

	<link rel="shortcut icon" type="image/png" href="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/images/favicon.png') }}"/>
	<link rel="shortcut icon" type="image/png" href="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/images/favicon.png') }}"/>
	@show
</head>
<body class="home page">
<div class="boxed-container">
	@include("theme::partial.topheader")
	@include("theme::partial.topmenu")
		@yield('content')
	@include('theme::partial.footer')
</div><!-- end of .boxed-container -->
@section('footer')
<script src="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/jquery.min.js') }}"></script>
<script src="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/modernizr.custom.24530.js') }}"></script>

<script type="text/javascript">
$(document).ready(function(){
  $('#login-trigger').click(function(){
    $(this).next('#login-content').slideToggle();
    $(this).toggleClass('active');          
    
    if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
      else $(this).find('span').html('&#x25BC;')
    })
});
</script>
@show
</body>
</html>