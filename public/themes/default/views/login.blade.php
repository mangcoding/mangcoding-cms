@section('title', app('title'))
@section('keywords', app('keywords'))
@section('description', app('description'))

@extends('theme::layouts.default')
@section('content')
	<div class="main-title" style="background-color: #f2f2f2">
		<div class="container">
			<h1 class="main-title__primary">Login to download Files</h1>
			<h3 class="main-title__secondary">Contact administator to get username and password </h3>
		</div>
	</div>
	{!! Breadcrumbs::render('register') !!}
	<div class="master-container">
		<div class="spacer-big"></div>
		<div class="hentry container" role="main">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-grid widget widget_text panel-last-child">
						<h3 class="widget-title">Please Login to download Files</h3>	
					</div>
				</div>
			</div>
			<div class="spacer"></div>
			<div class="row">			
				<div class="col-md-3">
					<div class="textwidget panel widget">
						<span class="icon-container"><span class="fa fa-key"></span></span> <b>Authorization page</b><br>
						Contact administator to get username and password<br>
					</div>
				</div>
				<div class="col-md-9">
					@if ($alert = Session::get('message'))
	                    <div class="alert alert-danger">
	                        {{ $alert }}
	                    </div>
	                @endif
					<div class="wpcf7" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
						<form method="post" class="wpcf7-form" novalidate="novalidate">
							{!! csrf_field() !!}
							<div class="row">
								<div class="col-xs-12  col-sm-6">
									<span class="wpcf7-form-control-wrap your-email">
										<input type="text" name="username" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email" placeholder="Username"/>
									</span>
								</div>
								<div class="col-xs-12  col-sm-6">
									<span class="wpcf7-form-control-wrap your-email">
										<input type="password" name="password" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email" placeholder="Password"/>
									</span><br/>
									<input type="submit" value="LOGIN" class="wpcf7-form-control wpcf7-submit btn btn-primary"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
	</div>
@stop
@section('head')
@parent
<link href="{{ Url::asset('themes/iiha/assets/css/wizard.css') }}" rel="stylesheet" />
<link href="{{ Url::asset('themes/iiha/assets/js/calender/jquery-ui.css') }}" rel="stylesheet" />
@stop
@section('footer')
@parent
<script src="{{ Url::asset('themes/iiha/assets/js/wizard/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ Url::asset('themes/iiha/assets/js/wizard/prettify.js') }}"></script>
<script src="{{ Url::asset('themes/iiha/assets/js/calender/jquery-ui.js') }}"></script>
<script src="{{ Url::asset('themes/iiha/assets/js/modal.js') }}"></script>
<script src="{{ Url::asset('themes/iiha/assets/js/script.js') }}"></script>
<script src="{{ Url::asset('themes/iiha/assets/js/employer.js') }}"></script>

<script>
$(document).ready(function() {
   $('#state').change(function(){
        $.get("{{ url('api/city')}}", 
        { option: $(this).val() }, 
        function(data) {
            $('#city').empty(); 
            $.each(data, function(key, element) {
                $('#city').append("<option value='" + key +"'>" + element + "</option>");
            });
        });
    });

    
    $('#tab2').on('change', '#city', function(){
        $.get("{{ url('api/regency')}}", 
        { option: $(this).val() }, 
        function(data) {
            $('#regency').empty(); 
            $.each(data, function(key, element) {
                $('#regency').append("<option value='" + key +"'>" + element + "</option>");
            });
        });
    })

    $('#tab2').on('change', '#regency', function(){
        $.get("{{ url('api/district')}}", 
        { option: $(this).val() }, 
        function(data) {
            $('#district').empty(); 
            $.each(data, function(key, element) {
                $('#district').append("<option value='" + key +"'>" + element + "</option>");
            });
        });
    })
});
</script>
@stop