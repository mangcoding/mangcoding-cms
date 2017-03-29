<?PHP 
$href = Request::segment(1); 
if (in_array($href, ["berita","news"])) $bread = "news";
else if (in_array($href, ["agenda","events"])) $bread = "events";
else if (in_array($href, ["isu-terkini","current-issues"])) $bread = "issue";
else $bread = "page";
?>
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
	{!! Breadcrumbs::render($bread) !!}
	<div class="master-container">
		<div class="container">
			<div class="row">
				<main class="col-xs-12  col-md-9" role="main">
					<div class="row">
						@foreach($news as $page)
						<div class="col-xs-12">
							<article class="post sticky hentry post-inner">
								@if ($page->featured=="1" && $page->featured_img != null)
								<a href="{{ url($href.'/'.$page->href) }}">

									<img src="{{ $image = \File::exists('uploads/media/big_'.$page->featured_img) ? url('uploads/media/big_'.$page->featured_img) : url('uploads/media/'.$page->featured_img) }}"  }}" alt="" class="featured">
								</a>
								@endif
								<div class="meta-data">
									<time datetime="{!! $page->created_at !!}" class="meta-data__date">{{ Helpers::indonesian_date($page->created_at, "l, d F Y","") }}</time>
									<span class="meta-data__author">By {!! $page->fullName !!}</span>
									<!--
									<span class="meta-data__categories"><a href="blog-single.html">Construction</a> &bull; <a href="blog-single.html">General Information</a></span>	
									<span class="meta-data__comments"><a href="blog-single.html">4 Comments</a></span>
									-->
								</div>
								<h2 class="hentry__title">
									<a href="{{ url($href.'/'.$page->href) }}">{{ $page->title }}</a>
								</h2>
								<div class="hentry__content">
									<p>{!! str_limit($page->content,300) !!}</p>
									<p><a href="{{ url($href.'/'.$page->href) }}" class="more-link"><span class="read-more read-more--post">{{ trans('button.more') }}</span></a></p>
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
						<div class="widget widget_recent_entries push-down-30">	
							<h4 class="sidebar__headings">Awesome Posts</h4>	
							<ul>
								@foreach ($postTerkini as $news)
								<li><a href="{{ url($href.'/'.$news->href) }}">{{ $news->title }}</a></li>
								@endforeach
							</ul>
						</div>
						
						<div class="widget widget_tag_cloud push-down-30">
							<h4 class="sidebar__headings">Tag Cloud</h4>
							<div class="tagcloud">
								@foreach ($tag as $tag)
									<a href="#" title="4 topics" style="font-size: {{ $font[array_rand($font)] }}pt;">{{ $tag }}</a>
								@endforeach
								<!--
								<a href="#" title="4 topics" style="font-size: 8pt;">Backyard</a>
								<a href="#" title="2 topics" style="font-size: 12pt;">Construction</a>
								-->
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div><!-- /container -->
	</div>
@stop