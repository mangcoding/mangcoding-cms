  <div class="panel-body tab-pane" id="tab1">
    <div class="form-horizontal">
    @include("theme::partial.message")
      <div class="form-group file">
          <label class="col-sm-3 control-label label-center">
              <img src="{{ isset($employer) ? $employer->avatar : "" }} " id="gambar" />
              <i class="border-circle fa fa-user fa-3x"></i>
          </label>
          <div class="col-sm-9">
            <span>{{ trans('form.uploadPhoto') }}</span>
            {!! Form::file('avatar', ['class'=>'form-control wpcf7-form-control wpcf7-text', 'id'=>'avatar', 'accept' => 'image/*']) !!}
          </div>
      </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.title') }}</label>
      <div class="col-sm-9">
        {!! Form::text('prefix', Input::old('prefix'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'prefix']) !!} 
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.name') }}</label>
      <div class="col-sm-9">
       {!! Form::text('fullName', Input::old('fullName'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'fullName']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.subfix') }}</label>
      <div class="col-sm-9">
        {!! Form::text('subfix', Input::old('subfix'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'subfix']) !!} 
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.gender') }}</label>
      <div class="col-sm-9">
        <div class="radio col-sm-5">
          <label>{{ Form::radio('gender', "L", (Input::old('gender')=="L"), ['id' => 'genderP', 'class'=>'required']) }} {{ trans('form.male') }}</label>  
        </div>
        <div class="radio col-sm-5">
          <label>{{ Form::radio('gender', "P", (Input::old('gender')=="P"), ['id' => 'genderL']) }} {{ trans('form.female') }}</label>  
        </div> 
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.birthplace') }}</label>
      <div class="col-sm-9">
       {!! Form::text('birthPlace', Input::old('birthPlace'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'birthPlace']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.birthdate') }}</label>
      <div class="col-sm-9">
       {!! Form::text('birthDate', Input::old('birthDate'), ['class'=>'form-control wpcf7-form-control wpcf7-text required datepicker', 'id'=>'birthDate']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.noKTP') }}</label>
      <div class="col-sm-9">
       {!! Form::text('civilizationNo', Input::old('civilizationNo'), ['class'=>'form-control wpcf7-form-control wpcf7-text', 'id'=>'civilizationNo']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.phone') }}</label>
      <div class="col-sm-9">
       {!! Form::text('phone', Input::old('phone'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'phone']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.homePhone') }}</label>
      <div class="col-sm-9">
       {!! Form::text('homePhone', Input::old('homePhone'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'homePhone']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.email') }}</label>
      <div class="col-sm-9">
       {!! Form::text('email', Input::old('email'), ['class'=>'form-control wpcf7-form-control wpcf7-text', 'id'=>'email']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.education') }}</label>
      <div class="col-sm-9">
       {!! Form::select('pendidikan', config('umum.pendidikan'), Input::old('pendidikan'), ['class'=>'form-control wpcf7-form-control wpcf7-select required', 'id'=>'pendidikan']) !!}
      </div>
    </div>
    
  </div>
</div>

