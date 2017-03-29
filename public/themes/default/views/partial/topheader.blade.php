<div class="top">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<div class="top__left">
						<div class="visible-xs">
						  <form action="{{ url('result') }}">
							<div class="input-group">
							  <input type="text" name="keywords" class="form-control cari" aria-describedby="sizing-addon1"  placeholder="{{ trans('button.searchFor') }}">
							  <span class="input-group-btn">
								<button class="btn btn-default" type="submit">{{ trans('button.go') }}</button>
							  </span>
							</div>
						  </form>
						</div>
					    <form action="{{ url('result') }}" class="visible-lg">
						<div class="input-group">
						  <input type="text" name="keywords" class="form-control" placeholder="{{ trans('button.searchFor') }}">
						  <span class="btn-search">
							<button class="btn-small" type="submit"><i class="fa fa-search"></i></button>
						  </span>
						</div><!-- /input-group -->
						</form>
					</div>
				</div>
				<div class="col-xs-12 col-md-8">	
					<div class="top__right" id="menu-top-menu">
						<nav>
						  <ul>
							<li id="signup">
							  <a href="{{ url(str_slug(trans('routes.contactUs'))) }}">{{ trans('routes.contactUs') }}</a>
							</li>
							<li id="signup">
							  <a href="{{ url(str_slug(trans('routes.register'))) }}">{{ trans('routes.register') }}</a>
							</li>
							<li class="indo"><a href="{{ url('language/id') }}">Indonesia</a></li>
             				<li class="eng"><a href="{{ url('language/en') }}">Inggris</a></li>
						  </ul>
						</nav>			
					</div>
					
					<div class="pull-right">
						<ul id="sosmed">
							<li><a href="{!! app('facebook') !!}"><i class="fa fa-facebook"></i></a></li>
							<li><a href="{!! app('twitter') !!}"><i class="fa fa-twitter"></i></a></li>
							<li><a href="{!! app('linkedin') !!}"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="{!! app('instagram') !!}"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>