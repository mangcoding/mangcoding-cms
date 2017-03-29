@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)
@extends('theme::layouts.default')
@section('content')
	<div class="main-title" style="background-color: #f2f2f2; ">
		<div class="container">
			<h1 class="main-title__primary">{{ $title }}</h1>
			<h3 class="main-title__secondary">{{ $description }}</h3>
		</div>
	</div>
	{!! Breadcrumbs::render('pages', trans('button.searchFor')) !!}
	<div class="master-container">
		<div class="container">
			<div class="row">
				<main class="col-xs-12  col-md-9" role="main">
					<div class="row">
						@foreach($news as $page)
						<div class="col-xs-12">
							<article class="post sticky hentry post-inner">
								@if ($page->featured_img != null)
								<a href="{{ url($page->href) }}">
									<img src="{{ url('uploads/media/big_'.$page->featured_img) }}" alt="" class="featured">
								</a>
								@endif
								<div class="meta-data">
									<time datetime="{!! $page->created_at !!}" class="meta-data__date">{{ Helpers::indonesian_date($page->created_at, "l, d F Y","") }}</time>
									<!--
									<span class="meta-data__categories"><a href="blog-single.html">Construction</a> &bull; <a href="blog-single.html">General Information</a></span>	
									<span class="meta-data__comments"><a href="blog-single.html">4 Comments</a></span>
									-->
								</div>
								<h2 class="hentry__title">
									<a href="{{ url($page->href) }}">{{ $page->title }}</a>
								</h2>
								<div class="hentry__content">
									<p>{!! str_limit($page->content,300) !!}</p>
									<p><a href="{{ url($page->href) }}" class="more-link"><span class="read-more read-more--post">{{ trans('button.more') }}</span></a></p>
								</div>
								<div class="clearfix"></div>
							</article>
						</div><!-- /blogpost -->
						@endforeach
						<div class="col-xs-12">
							{{ $news->render() }}
						</div>
					</div>
				</main>
				<div class="col-xs-12  col-md-3">
					<div class="sidebar">
						{!! app('App\Banner')->showBanner(3) !!}
						<div class="clearfix"></div>
						@include("theme::widgets.twitter")
						<div class="clearfix"></div>
						@include("theme::widgets.visitors")
						{!! app('App\Banner')->showBanner(2) !!}
					</div>
				</div>
			</div>
		</div><!-- /container -->
	</div>
@stop