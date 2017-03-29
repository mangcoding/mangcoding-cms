<div class="panel-body tab-pane" id="tab2">
  <div class="form-horizontal">
   <div class="form-group">
    <label class="col-sm-3 control-label">{{ trans('form.street') }}</label>
    <div class="col-sm-9">
     {!! Form::text('jalan', Input::old('jalan'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'jalan']) !!}
    </div>
  </div>
  <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.province') }}</label>
      <div class="col-sm-9">
      {!! Form::select('provinsi', App\Provincy::Select(), Input::old('provinsi'), ['id'=>'state', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
      </div>
  </div>
  <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.city') }}</label>
      <div class="col-sm-9">
       @if (Input::old('provinsi'))
          {!! Form::select('kota', App\City::Select(Input::old('provinsi')), Input::old('kota'), ['id'=>'city', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
       @else
          {!! Form::select('kota', array(''=>'Pilih Kota'), Input::old('kota'), ['id'=>'city', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
       @endif
       </div>
  </div>
  <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.regency') }}</label>
      <div class="col-sm-9">
      @if (Input::old('kota'))
          {!! Form::select('kecamatan', App\Regency::Select(Input::old('kota')), Input::old('kecamatan'), ['id'=>'regency', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
      @else
          {!! Form::select('kecamatan', array(''=>'Pilih Kecamatan'), Input::old('kecamatan'), ['id'=>'regency', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
      @endif
      </div>
  </div>
  <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.district') }}</label>
      <div class="col-sm-9">
      @if (Input::old('kecamatan'))
          {!! Form::select('kelurahan', App\District::Select(Input::old('kecamatan')), Input::old('kelurahan'), ['id'=>'district', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
      @else
          {!! Form::select('kelurahan', array(''=>'Pilih Kelurahan'), Input::old('kelurahan'), ['id'=>'district', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
      @endif
      </div>
  </div>
  <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.poscode') }}</label>
      <div class="col-sm-9">
      {!! Form::text('kodepos', Input::old('kodepos'), ['class'=>'form-control wpcf7-form-control wpcf7-text required','id'=>'kodepos']) !!}
      </div>
  </div>
  </div>
</div>