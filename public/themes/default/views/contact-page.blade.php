@section('title', app('title'))
@section('keywords', app('keywords'))
@section('description', app('description'))

@extends('theme::layouts.default')
@section('content')
	<div class="main-title" style="background-color: #f2f2f2">
		<div class="container">
			<h1 class="main-title__primary">{{ trans('routes.contactUs') }}</h1>
			<h3 class="main-title__secondary">{{ trans('routes.contactWaiting') }}</h3>
		</div>
	</div>
	{!! Breadcrumbs::render('contact') !!}
	<div class="master-container">
		<div class="spacer-big"></div>
		<div class="hentry container" role="main">
			<div class="">
				<div class="col-md-12">
					<div class="panel panel-grid widget widget_text panel-last-child">
						<h3 class="widget-title">{{ trans('routes.contactUs') }}</h3>	
					</div>
				</div>
			</div>
			<div class="spacer"></div>
			<div class="row">			
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
						<form method="post" class="wpcf7-form" novalidate="novalidate">
							{!! csrf_field() !!}
							<div class="row">
								<div class="col-xs-12  col-sm-4">
									<span class="wpcf7-form-control-wrap your-name">
										<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text" placeholder="Your Name"/>
									</span><br/>
									<span class="wpcf7-form-control-wrap your-email">
										<input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email" placeholder="E-mail address"/>
									</span><br/>
									<span class="wpcf7-form-control-wrap your-subject">
										<input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" placeholder="Subject"/>
									</span>
								</div>
								<div class="col-xs-12  col-sm-8">
									<span class="wpcf7-form-control-wrap your-message">
										<textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Message"></textarea>
									</span><br/>
									<input type="submit" value="SEND MESSAGE" class="wpcf7-form-control wpcf7-submit btn btn-primary"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
	</div>
@stop