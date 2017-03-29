<div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
	{!! Form::label('slug', 'Link Href :') !!}
	{!! url('/') .'/'. Form::text('href_id', null, ['class'=>'slug','readonly'=>'readonly','id' => 'href_id']) !!}
	<small class="text-danger">{!! $errors->first('slug') !!}</small>
</div>
<div class="form-group">
	{!! Form::label('title', 'Title') !!}				
	{!! Form::text('title_id', Input::old('title_id'), ['id'=>'title_id', 'class'=>'required form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('keywords', 'keywords') !!}		
	{!! Form::text('keywords_id', Input::old('keywords_id'), ['class'=>'required form-control', 'placeholder'=>'Put keywords for SEO']) !!}
</div>
<div class="form-group">
	{!! Form::label('description', 'Short Description') !!}				
	{!! Form::text('description_id', Input::old('description_id'), ['class'=>'required form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('content', 'Content') !!}
	{!! Form::textarea('content_id', Input::old('content_id'), ['class'=>'required form-control','class'=>'tinymce']) !!}
</div>	
<div class="form-group pull-right">
	<button type="button" id="submit" class="btn btn-success button-previous">Back</button>
	<button type="button" id="submit" class="btn btn-success button-next">Continue</button>
</div>
<script>
	$("#title_id").keyup(function(){
		var str = sansAccent($(this).val());
		str = str.replace(/[^a-zA-Z0-9\s]/g,"");
		str = str.toLowerCase();
		str = str.replace(/\s/g,'-');
		$("#href_id").val(str);        
	});

</script>