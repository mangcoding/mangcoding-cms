@section('title', app('title'))
@section('keywords', app('keywords'))
@section('description', app('description'))

@extends('theme::layouts.default')
@section('content')
	<div class="main-title" style="background-color: #f2f2f2">
		<div class="container">
			<h1 class="main-title__primary">{{ trans('routes.register') }}</h1>
			<h3 class="main-title__secondary">{{ trans('routes.contactWaiting') }}</h3>
		</div>
	</div>
	{!! Breadcrumbs::render('register') !!}
	<div class="master-container">
		<div class="spacer-big"></div>
		<div class="hentry container" role="main">
			<div class="">			
				<div class="col-md-3">
					<div class="textwidget panel widget">
						<span class="icon-container"><span class="fa fa-home"></span></span> <b>{!! app('address') !!}</b><br>
						<span class="icon-container"><span class="fa fa-phone"></span></span> <b>{!! app('contact') !!}</b><br>
						<span class="icon-container"><span class="fa fa-fax"></span></span> <b>{!! app('altContact') !!}</b><br>
						<span class="icon-container"><span class="fa fa-envelope"></span></span><a href="mailto:{!! app('email') !!}">{!! app('email') !!}</a> 
						<br><br>
					</div>
					<div class="panel widget widget_pt_social_icons panel-last-child">	
						<a class="social-icons__link" href="{!! app('facebook')!!} " target="_blank"><i class="fa  fa-facebook"></i></a>
						<a class="social-icons__link" href="{!! app('twitter') !!}" target="_blank"><i class="fa  fa-twitter"></i></a>
						<a class="social-icons__link" href="{!! app('youtube') !!}" target="_blank"><i class="fa  fa-youtube"></i></a>
					</div>
				</div>
				<div class="col-md-9">
					<div class="wpcf7" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
						<div class="panel" id="rootwizard">
					      <div class="form-header navbar-inner">
					          <div class="form-header-body row">
					              <ul class="prog-1 row">
					                  <span></span>
					                  <li><a href="#tab1" data-toggle="tab">{{ trans('form.identity') }}</a><span></span></li>
					                  <li><a href="#tab2" data-toggle="tab">{{ trans('form.address') }}</a><span></span></li>
					                  <li><a href="#tab3" data-toggle="tab">{{ trans('form.edu') }}</a><span></span></li>
					                  <li><a href="#tab4" data-toggle="tab">{{ trans('form.workplace') }}</a><span></span></li>
					                  <div class="clear"></div>
					              </ul>
					          </div>
					      </div>  
					      {!! Form::open(['files' => true,'class'=>'set-profile']) !!}
					      <div class="form-body tab-content">     
						      @include("theme::register.first")
						      @include("theme::register.second")
						      @include("theme::register.third")
						      @include("theme::register.fourth")
					      </div>
					      <div class="form-action pull-right">
					          <button class="btn button-previous" type="button" style="display:none"><i class="fa fa-arrow-left fa-fw"></i>&nbsp; {{ trans('form.back') }}</button>
					          <button class="btn button-next" type="button">{{ trans('form.next') }} &nbsp;<i class="fa fa-arrow-right fa-fw"></i></button>
					          <button class="btn button-last" type="submit" style="display:none">{{ trans('form.save') }} &nbsp;<i class="fa fa-arrow-right fa-fw"></i></button>
					      </div>
					      <div class="clear"></div>
					      </div>
					      {{ Form::close() }}
					    </div>
					</div>
				</div>
			</div>
		</div><!-- /container -->
	</div>
@stop
@section('head')
@parent
<link href="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/css/wizard.css') }}" rel="stylesheet" />
<link href="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/calender/jquery-ui.css') }}" rel="stylesheet" />
@stop
@section('footer')
@parent
<script src="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/wizard/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/wizard/prettify.js') }}"></script>
<script src="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/calender/jquery-ui.js') }}"></script>
<script src="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/modal.js') }}"></script>
<script src="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/script.js') }}"></script>
<script src="{{ Url::asset('themes/'.config("theme.tempalteName").'/assets/js/employer.js') }}"></script>

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