<div class="jumbotron  jumbotron--with-captions">
	<div class="carousel  slide  js-jumbotron-slider" id="headerCarousel" data-interval="5000">
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<?PHP $x=1 ?>
			@foreach (App\Slider::get() as $slider)
			<div class="item {{ $x==1 ? 'active' : '' }}">
				<img src="{{ url('uploads/slider/'.$slider->images) }}" alt="{{ $slider->title_.App::getLocale()}}">
			</div>
			<?PHP $x++; ?>
			@endforeach
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#headerCarousel" role="button" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right carousel-control" href="#headerCarousel" role="button" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
	</div>
</div>