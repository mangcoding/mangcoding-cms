<?php
$Page = new App\Page;
$Page = $Page->setType(4)->setLimit(2)->getLatest();
$link = str_slug(trans('routes.issues'));
?>

<h4 class="sidebar__headings">{{ trans('title.currentIssue') }}</h4>
@foreach ($Page as $Issue)
<div class="panel widget widget_pt_featured_page" id="panel-7-1-2-2">
	<div class="has-post-thumbnail page-box page-box--inline">
		<a href="{{ url($link. '/'. $Issue->href) }}">
			@if ($Issue->featured_img != null)
				<img width="100px" height="100px" src="{{ $image = \File::exists('uploads/media/square_'.$Issue->featured_img) ? url('uploads/media/square_'.$Issue->featured_img) : url('uploads/media/'.$Issue->featured_img) }}"  alt="Content Image"/>
			@endif
		</a>
		<div class="page-box__content">
			<h5 class="page-box__title text-uppercase">
				<a href="{{ url($link. '/'. $Issue->href) }}">{{ $Issue->title }}</a>
			</h5>
			{!! str_limit($Issue->content, 100) !!}
		</div>
	</div>
	<div class="spacer"></div>
</div>
@endforeach
<a class="btn btn-primary align-right" href="{{ url($link) }}" target="_blank">{{ trans('button.moreIssues') }}</a>
<div class="spacer"></div>