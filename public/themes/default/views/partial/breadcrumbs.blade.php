@if ($breadcrumbs)
	<div class="breadcrumbs ">
		<div class="container">
			@foreach ($breadcrumbs as $breadcrumb)
            	@if (!$breadcrumb->last)
					<span typeof="v:Breadcrumb"><a title="{{ $breadcrumb->title }}" href="{{ $breadcrumb->url }}" class="home">
					{{ $breadcrumb->title }}</a></span>
				 @else
				 	<span typeof="v:Breadcrumb"><a title="{ $breadcrumb->title }}" href="#">{{ $breadcrumb->title }}</a></span>
				 @endif
	        @endforeach	 	
		</div>
	</div>
@endif