<header class="header bg-head">
	<div class="container">
		<div class="logo">
			<a href="{{ url('/') }}">
				<img src="{{ url('uploads/media/'.app('logo')) }}" alt="Mang Coding" class="img-responsive"/>
			</a>
		</div>
		
		<!-- Toggle Button for Mobile Navigation -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#buildpress-navbar-collapse">
			<span class="navbar-toggle__text">MENU</span>
			<span class="navbar-toggle__icon-bar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</span>
		</button>
	</div>
	<div class="container">
	<div class="blue"></div>
		<div class="navigation">
			<div class="collapse  navbar-collapse" id="buildpress-navbar-collapse">
				{!! Menu::generate() !!}
			</div>
		</div>
	</div>
</header>