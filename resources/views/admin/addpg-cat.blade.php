<div class="form-group">
	{!! Form::label('pagetype', 'pagetype') !!}				
	{!! Form::select('pagetype', $pagetype, Input::old('pagetype') != null ? Input::old('pagetype') : $pagetypeId, ['class'=>'required form-control required pagetype','readonly'=>'readonly']) !!}
</div>
<div class="form-group">
	{!! Form::label('parent', 'Parent Menus') !!}		
	{!! Form::select('parent', $parent, Input::old('parentid'), ['class'=>'form-control']) !!}
</div>
<div class="checkbox form-group">
	<label>
	{!! Form::checkbox('topmenu','1',Input::old('checked')) !!} <strong> Top Menu </strong>
	</label>	
	<label class="featured">
	{!! Form::checkbox('featured','1',Input::old('featured'), ['id'=>'select_featured']) !!} <strong> Featured posts </strong>
	</label>
</div>
<div class="form-group images-featured" style="{{ (isset($posts) && $posts->featured==1) ? : 'display:none;' }}">
	{!! Form::label('featured_img', 'Images Upload') !!}		
	{!! Form::file('featured_img', ['class'=>'form-control']) !!}
</div>	
<div class="form-group event-date" style="{{ $href != "events" ? 'display:none;' : '' }}">
	{!! Form::label('eventdate', 'Event Date') !!}		
	{!! Form::text('eventdate', Input::old('eventdate'), ['class'=>'form-control datepicker']) !!}
</div>	
<div class="form-group pull-right">
	<button type="button" class="btn btn-success button-next">Continue</button>
</div>