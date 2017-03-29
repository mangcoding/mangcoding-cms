@section('title', app('title'))
@section('keywords', app('keywords'))
@section('description', app('description'))

@extends('theme::layouts.default')
@section('content')
	<div class="main-title" style="background-color: #f2f2f2">
		<div class="container">
			<h1 class="main-title__primary">{{ $page->title }}</h1>
		</div>
	</div>
	{!! Breadcrumbs::render('page', $page) !!}
	<div class="master-container">
		<div class="container">
			<div class="">
				<main class="col-xs-12  {{ (is_array($linkTerkait)) ? 'col-md-9  col-md-push-3' :  'col-md-12' }}" role="main">
					<div class="row">
						@if ($page->featured=="1" && $page->featured_img != null)
							<img src="{{ url('uploads/media/'.$page->featured_img) }}" alt="" class="featured">
						@endif
						{!! $page->content !!}
					</div>	
					<div class="spacer"></div>
				
				</main>
				@if (is_array($linkTerkait))
				<div class="col-xs-12  col-md-3  col-md-pull-9">
					<div class="sidebar">
						<div class="widget widget_nav_menu  push-down-30">
							<div class="menu-services-menu-container">
								<ul id="menu-services-menu" class="menu">
									@foreach ($linkTerkait as $link)
										<li class="current-menu-item"><a href="{{ $link->href }}">{{ $link->title }}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div><!-- /container -->
@stop