<?PHP $sg = Request::segment(2) ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-10"> 
            <h1 class="page-header">{{ $sg=="add" ? 'Add Member' : 'Edit Member' }}</h1>            
            <!--Form fields-->
            @if( isset($members) )
                {!! Form::model($members, ['action' => ['Admin\Members@update', $members->memberid], 'files' => true]) !!}
            @else
                {!! Form::open(['files' => true]) !!}
            @endif
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
            <fieldset>
            <h3 class="page-header">Data Pribadi</h3>
                 <div class="form-group">
                    <label>IdMember</label>
                    {!! Form::text('idMember', Input::old('idMember'), ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Gelar Depan</label>
                    {!! Form::text('prefix', Input::old('prefix'), ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Name</label>
                    {!! Form::text('fullName', Input::old('fullName'), ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Gelar Belakang</label>
                    {!! Form::text('subfix', Input::old('subfix'), ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('form.birthdate') }}</label>
                     {!! Form::text('birthDate', Input::old('birthDate'), ['class'=>'form-control datepicker', 'id'=>'birthDate']) !!}
                </div>
                 <div class="form-group">
                    <label>{{ trans('form.noKTP') }}</label>
                    {!! Form::text('civilizationNo', Input::old('civilizationNo'), ['class'=>'form-control']) !!}
                </div>
                 <div class="form-group">
                    <label>{{ trans('form.phone') }}</label>
                    {!! Form::text('phone', Input::old('phone'), ['class'=>'form-control']) !!}
                </div>
                 <div class="form-group">
                    <label>{{ trans('form.homePhone') }}</label>
                    {!! Form::text('homePhone', Input::old('homePhone'), ['class'=>'form-control']) !!}
                </div>
                 <div class="form-group">
                    <label>Email</label>
                    {!! Form::text('email', Input::old('email'), ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('form.education') }}</label>
                     {!! Form::select('education', config('umum.pendidikan'), Input::old('education'), ['class'=>'form-control required', 'id'=>'education']) !!}
                </div>
            <!--
             <h3 class="page-header">Alamat</h3>
                <div class="form-group">
                    <label>{{ trans('form.street') }}</label>
                    {!! Form::text('jalan', Input::old('jalan'), ['class'=>'form-control', 'id'=>'jalan']) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('form.province') }}</label>
                    {!! Form::select('provinsi', App\Provincy::Select(), Input::old('provinsi'), ['id'=>'state', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('form.city') }}</label>
                   @if (Input::old('provinsi'))
                      {!! Form::select('kota', App\City::Select(Input::old('provinsi')), Input::old('kota'), ['id'=>'city', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
                   @else
                      {!! Form::select('kota', array(''=>'Pilih Kota'), Input::old('kota'), ['id'=>'city', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
                   @endif
                </div>
                <div class="form-group">
                    <label>{{ trans('form.regency') }}</label>
                    @if (Input::old('kota'))
                      {!! Form::select('kecamatan', App\Regency::Select(Input::old('kota')), Input::old('kecamatan'), ['id'=>'regency', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
                    @else
                      {!! Form::select('kecamatan', array(''=>'Pilih Kecamatan'), Input::old('kecamatan'), ['id'=>'regency', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
                    @endif
                </div>
                 <div class="form-group">
                    <label>{{ trans('form.district') }}</label>
                      @if (Input::old('kecamatan'))
                          {!! Form::select('kelurahan', App\District::Select(Input::old('kecamatan')), Input::old('kelurahan'), ['id'=>'district', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
                      @else
                          {!! Form::select('kelurahan', array(''=>'Pilih Kelurahan'), Input::old('kelurahan'), ['id'=>'district', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
                      @endif
                </div>
                 <div class="form-group">
                    <label>{{ trans('form.poscode') }}</label>
                    {!! Form::text('kodepos', Input::old('kodepos'), ['class'=>'form-control','id'=>'kodepos']) !!}
                </div>
            -->
            <h3 class="page-header">Pekerjaan</h3>
                <div class="form-group">
                    <label>{{ trans('form.certificated') }}</label>
                    {!! App\Certificated::checkbox($members->certificated) !!} 
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>{{ trans('form.yearInworld') }}</label>
                    {!! Form::text('startYear', Input::old('startYear'), ['class'=>'required form-control', 'id'=>'startYear']) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('form.companyName') }}</label>
                    {!! Form::text('companyName', Input::old('companyName'), ['class'=>'form-control', 'id'=>'companyName']) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('form.position') }}</label>
                    {!! Form::text('position', Input::old('position'), ['class'=>'form-control', 'id'=>'position']) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('form.officePhone') }}</label>
                    {!! Form::text('officePhone', Input::old('officePhone'), ['class'=>'form-control', 'id'=>'officePhone']) !!}
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button type="submit" class="btn btn-primary btn-success">Save</button>
            </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<br class="clear" />