<?php
$widget = new App\Widget;
$widget = $widget->getWidget('twitter');
if ($widget) :
?>
<div class="panel push-down-30">
	<h4 class="sidebar__headings">{{ $widget->title }}</h4>
	<div class="has-post-thumbnail page-box page-box--block embed-twitter">
		{!! $widget->content !!}
	</div>
</div>

<?php endif; ?>