<div class="form-group">
	{!! Form::label('publish', 'Publish Your Pages') !!}				
	{!! Form::select('status', ["unpublish","publish"], Input::old('status'), ['class'=>'form-control required']) !!}
</div>	
<div class="form-group pull-right">
	<button type="submit" id="submit" class="btn btn-success button-last">Save Settings</button>
</div>