<div class="panel-body tab-pane" id="tab4">
  <div class="form-horizontal"> 
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.certificated') }}</label>
      <div class="col-sm-9">
          {!! App\Certificated::checkbox() !!} 
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.yearInworld') }}</label>
      <div class="col-sm-9">
       {!! Form::text('startYear', Input::old('startYear'), ['class'=>'required form-control wpcf7-form-control wpcf7-text required', 'id'=>'startYear']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.companyName') }}</label>
       <div class="col-sm-9">
       {!! Form::text('companyName', Input::old('companyName'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'companyName']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.position') }}</label>
       <div class="col-sm-9">
       {!! Form::text('position', Input::old('position'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'position']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.officePhone') }}</label>
       <div class="col-sm-9">
       {!! Form::text('officePhone', Input::old('officePhone'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'officePhone']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3"><span class="pull-right">{!! captcha_img() !!}</span></label>
       <div class="col-sm-9">
       {!! Form::text('captcha', null, ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'captcha']) !!}
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>