<?php
$Page = new App\Page;
$Page = $Page->getByidPages(1);
?>

@section('title', app('title'))
@section('keywords', app('keywords'))
@section('description', app('description'))

@extends('theme::layouts.default')
@section('content')
@include("theme::partial.slider")	
<div class="master-container">
	<div class="clearfix"></div>
	<div class="spacer"></div>
	<div class="container" role="main">
		<div class="row">
			<div class="col-md-4 video">
				@include('theme::partial.issues.front')
				{!! app('App\Banner')->showBanner(3) !!}
				@include("theme::widgets.video")
				<div class="clearfix"></div>
				@include("theme::widgets.twitter")
				<div class="clearfix"></div>
				@include("theme::widgets.visitors")
				{!! app('App\Banner')->showBanner(2) !!}
			</div>				
			<div class="col-md-8">
			<div class="clearfix"></div>
				<div class="panel">
					<div class="has-post-thumbnail page-box page-box--block">
						<?php if ($Page) : ?>
						<div class="page-box__content">
							<h4 class="sidebar__headings">{{ $Page->title }}</h4>
							@if ($Page->featured_img != null)
								<img src="{{ url('uploads/media/'.$Page->featured_img) }}" alt="" width="100%">
							@endif
							{!! $Page->content !!}
							<a class="btn btn-primary pull-right" href="{{ url($Page->href) }}" target="_blank">{{ trans('button.more') }}</a>
							<div class="spacer"></div>
						</div>
						<div class="spacer"></div>
						<?php endif; ?>
						<div class="page-box__content">
							{!! app('App\Banner')->showBanner(1) !!}
						</div>
						<div class="spacer"></div>
						<div class="col-md-6">
							@include('theme::partial.news.front')
						</div>
						<div class="col-md-6">
							@include('theme::partial.events.front')
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
@stop