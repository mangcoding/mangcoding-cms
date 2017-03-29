<?php
$href = Request::segment(2);
if ($href == "pages") $pagetypeId = 1;
else if ($href == "news") $pagetypeId = 2;
else if ($href == "events") $pagetypeId = 3;
else if ($href == "issues") $pagetypeId = 4;
else if ($href == "link") $pagetypeId = 5;
else $pagetypeId = "";

$TinyMCE =  new TinyMCE(url('assets/js/tinymce'));
echo $TinyMCE->load();
?>
<div id="page-wrapper">
	<div class="row" id="wizard">
		<div class="col-lg-12"> 
		<h1 class="page-header">{!! $sg=="create" ? 'Create Pages' : 'Edit Pages'  !!}</h1>	
		<!--Form fields-->
		@if( isset($posts) )
			{!! Form::model($posts, [
			'action' => ['Admin\Pages@update', $posts->idpages],
			'files' => true, "id"=>"registrasi"]) !!}
		@else
		   	{!! Form::open(['action' => ['Admin\Pages@store'], 'files' => true, "id"=>"registrasi"]) !!}
		@endif
		<div id="rootwizard" class="featurette">
			<div class="navbar">
			  <div class="navbar-inner">
				<ul>
					<li><a href="#cat" data-toggle="tab">Select Categories</a></li>
					<li><a href="#en" data-toggle="tab">English language</a></li>
					<li><a href="#id" data-toggle="tab">Indonesian language</a></li>
					<li><a href="#publish" data-toggle="tab">Publish your page</a></li>
				</ul>
			  </div>
			</div>
			<div id="bar" class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
			</div>
			<div class="tab-content">
				@if ($alert = Session::get('message'))
	                @if (is_object($alert))
	                    <div class="alert alert-danger">
	                        @foreach ($alert->all() as $msg)
	                        {{ $msg."<br />" }}
	                        @endforeach
	                    </div>
	                @else
	                    <div class="alert alert-success">
	                        {{ $alert }}
	                    </div>
	                @endif
	            @endif 
	            
				@if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif 	    
				<div class="tab-pane active" id="cat">
					@include('admin/addpg-cat')
				</div>	
				<div class="tab-pane" id="en">
			    	@include('admin/addpg-en')
				</div>
				<div class="tab-pane" id="id">
			    	@include('admin/addpg-id')
				</div>
				<div class="tab-pane" id="publish">
			    	@include('admin/addpg-end')
				</div>
			</div>
		</div>	
		{!! Form::close() !!}
		</div>
	</div>
</div>
<br class="clear" />