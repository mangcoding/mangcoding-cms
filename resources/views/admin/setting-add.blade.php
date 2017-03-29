<div id="page-wrapper">
    <div class="col-lg-12"> 
        <h1 class="page-header row">
          Settings
        </h1>
        <fieldset>
        @if ($alert = Session::get('message'))
            @if (is_object($alert))
                <div class="alert row alert-danger">
                    @foreach ($alert->all() as $msg)
                    {{ $msg."<br />" }}
                    @endforeach
                </div>
            @else
                <div class="alert row alert-success">
                    {{ $alert }}
                </div>
            @endif
        @endif 
        @if (count($errors) > 0)
            <div class="alert row alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
      @if (isset($posts))
        {!! Form::model($posts, ['action' => ['Admin\Settings@update', $posts->id], 'files' => true]) !!}
      @else
        {!! Form::open(['action' => ['Admin\Settings@store'], 'files' => true,'class'=>'set-profile' ]) !!}
      @endif
      <div class="form-horizontal">
        <div class="form-group">
          <label>Nama Setting (can't edit)</label>
            {!! Form::text('settingName', Input::old('settingName'), ['class'=>'form-control required', 'id'=>'settingName', 'required'=>'required',"readonly"=>"readonly"]) !!}
        </div>
        <div class="form-group">
          <label>Values</label>
            {!! Form::text('settingValue', Input::old('settingValue'), ['class'=>'form-control required', 'id'=>'settingValue', 'required'=>'required']) !!}
        </div>
        <button type="button" class="btn btn-primary button-next" onclick="history.back(-1)">Back</button>
        <button type="submit" class="btn btn-success button-next">Save</button>
        <div class="clear"></div>
      </div>
      {{ Form::close() }}
    </div>
    </fieldset>
    <div class="clear"></div>
</div>