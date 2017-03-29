<?php
$Page = new App\Page;
$Page = $Page->setType(3)->setLimit(5)->getLatest();
?>
<h4 class="sidebar__headings">{{ trans('title.upcomingEvents') }}</h4>
@foreach ($Page as $events)
<div class="widget widget-brochure-box  push-down-20">
	<a class="brochure-box" href="{{ url($events->href) }}">
		<i class="fa fa-clock-o"></i>
		<h5 class="brochure-box__text">{{ str_limit($events->title,30) }}</h5>
	</a>
</div>
@endforeach
<div class="widget widget-brochure-box  push-down-20">
	<a class="brochure-box" href="{{ url(str_slug(trans('routes.events'))) }}">
		<h5 class="brochure-box__text">{{ trans('button.moreEvents') }}</h5>
	</a>
</div>