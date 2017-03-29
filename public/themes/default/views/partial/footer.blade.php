<footer>
	<div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom__left ft-nav">
				<ul>
					<li><a href="{{ str_slug(trans('routes.term')) }}">{{ trans('routes.term') }}</a></li>
					<li><a href="{{ str_slug(trans('routes.privacy')) }}">{{ trans('routes.privacy') }}</a></li>
					<li><a href="{{ str_slug(trans('routes.sitemap')) }}">{{ trans('routes.sitemap') }}</a></li>
					<li><a href="{{ str_slug(trans('routes.contactUs')) }}">{{ trans('routes.contactUs') }}</a></li>
				</ul>
			</div>
			<div class="footer-bottom__right">
				{!! app('footer') !!}
			</div>
		</div>
	</div>
</footer>