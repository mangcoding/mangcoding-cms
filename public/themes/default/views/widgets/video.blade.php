<?php
$widget = new App\Widget;
$widget = $widget->getWidget('youtube');
if ($widget) :
?>
<div class="panel push-down-30">
	<div class="has-post-thumbnail page-box page-box--block">
		<div class="page-box__content">
			<h4 class="sidebar__headings">{{ $widget->title }}</h4>
			{!! $widget->content !!}
		</div>
		
	</div>
</div>
<?php endif; ?>