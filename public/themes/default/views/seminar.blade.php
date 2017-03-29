@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)
@extends('theme::layouts.default')
@section('content')
	<div class="main-title" style="background-color: #f2f2f2; ">
		<div class="container">
			<h1 class="main-title__primary">{!! $title !!}</h1>
			<h3 class="main-title__secondary">{!! $description !!}</h3>
		</div>
	</div>
	{!! Breadcrumbs::render('pages','seminar') !!}
	<div class="master-container">
		<div class="container">
			<div class="row">
				<main class="col-xs-12  col-md-9" role="main">
					<div class="">
					@if (count($seminar)>0)
						@foreach($seminar as $page)
						<div class="col-xs-12">
							<article class="post sticky hentry post-inner">
								<div class="meta-data">
									<div class="meta-data">
									<label class="col-sm-3 row"><i class="fa fa-calendar fa-fw"></i>Seminar Date </label> : <time datetime="{!! $page->created_at !!}" class="meta-data__date ">{{ Helpers::indonesian_date($page->eventDate, "l, d F Y")." ".$page->eventHours }}</time>
									<div class="clearfix"></div>
									<label class="col-sm-3 row"><i class="fa fa-phone-square fa-fw"></i>Contact </label> : {!! $page->contact !!}
									<div class="clearfix"></div>
								</div>	
								</div>
								<h2 class="hentry__title">
									<a href="{{ url('/seminar/'.$page->idSeminar) }}">{{ $page->title }}</a>
								</h2>
								<div class="hentry__content">
									<p>{!! str_limit($page->description,300) !!}</p>
									<p><a href="{{ url('/seminar/'.$page->idSeminar) }}" class="more-link"><span class="read-more read-more--post">{{ trans('button.more') }}</span></a></p>
								</div>
								<div class="clearfix"></div>
							</article>
						</div><!-- /blogpost -->
						@endforeach
						<div class="col-xs-12">
							{{ $seminar->render() }}
						</div>
					@else
						<p>Tidak ada Seminar Aktif Saat ini</p>
					@endif
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