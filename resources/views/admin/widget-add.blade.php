<div id="page-wrapper">
    <div class="col-lg-12"> 
        <h1 class="page-header row">
          {{ isset($posts) ? "Edit Widget" : "Tambah Widget" }}
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
        {!! Form::model($posts, ['action' => ['Admin\Widgets@update', $posts->widgetid], 'files' => true]) !!}
      @else
        {!! Form::open(['action' => ['Admin\Widgets@store'], 'files' => true,'class'=>'set-profile' ]) !!}
      @endif
      <div class="form-horizontal">
        <div class="form-group">
          <label>Nama Widget</label>
            {!! Form::text('widgetName', Input::old('widgetName'), ['class'=>'form-control required', 'id'=>'widgetName', 'required'=>'required']) !!}
        </div>
        <div class="form-group">
          <label>Title (Indonesia)</label>
            {!! Form::text('title_id', Input::old('title_id'), ['class'=>'form-control required', 'id'=>'title_id', 'required'=>'required']) !!}
        </div>
        <div class="form-group">
          <label>Title (Inggris)</label>
            {!! Form::text('title_en', Input::old('title_en'), ['class'=>'form-control required', 'id'=>'title_en', 'required'=>'required']) !!}
        </div>
        <div class="form-group">
          <label>Widget Value</label>
            {!! Form::textarea('widgetValue', Input::old('widgetValue'), ['class'=>'form-control required', 'id'=>'widgetValue', 'required'=>'required']) !!}
        </div>
        <button type="submit" class="btn btn-success button-next row">Save</button>
        <div class="clear"></div>
      </div>
      {{ Form::close() }}
    </div>
    </fieldset>
    <div class="clear"></div>
</div>