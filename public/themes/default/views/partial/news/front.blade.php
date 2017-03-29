<?php
$Page = new App\Page;
$Page = $Page->setType(2)->setLimit(5)->getLatest();
?>
<h4 class="sidebar__headings">{{ trans('title.latestNews') }}</h4>
@foreach ($Page as $news)
<div class="widget widget-brochure-box  push-down-20">
	<a class="brochure-box" href="{{ url($news->href) }}">
		<i class="fa fa-newspaper-o"></i>
		<h5 class="brochure-box__text">{{ str_limit($news->title,30) }}</h5>
	</a>
</div>
@endforeach
<div class="widget widget-brochure-box  push-down-20">
	<a class="brochure-box" href="{{ url(str_slug(trans('routes.news'))) }}">
		<h5 class="brochure-box__text">{{ trans('button.moreNews') }}</h5>
	</a>
</div>