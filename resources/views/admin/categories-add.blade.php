<div id="page-wrapper">
    <div class="col-lg-12"> 
        <h1 class="page-header row">
          {{ isset($cate) ? "Edit Categories" : "Tambah Categories" }}
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
      @if (isset($cate))
        {!! Form::model($cate, ['action' => ['Admin\Categories@update', $cate->catid], 'files' => true]) !!}
      @else
        {!! Form::open(['action' => ['Admin\Categories@store'], 'files' => true,'class'=>'set-profile' ]) !!}
      @endif
      <div class="form-horizontal">
        <div class="form-group">
          <label>Categories for :</label>
            {!! Form::select('typeid', \App\Pagetype::select(), Input::old('typeid'), ['class'=>'form-control required', 'id'=>'typeid','placeholder'=>'Pilih Grup']) !!}
        </div>
        <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
          {!! Form::label('slug', 'English Href :') !!}
          {!! url('/') .'/'. Form::text('href_en', Input::old('href_en'), ['class'=>'slug','readonly'=>'readonly','id' => 'href_en']) !!}
          <small class="text-danger">{!! $errors->first('slug') !!}</small>
        </div>
        <div class="form-group">
          <label>Nama Categories (English)</label>
            {!! Form::text('cat_en', Input::old('cat_en'), ['class'=>'form-control required', 'id'=>'cat_en', 'required'=>'required']) !!}
        </div>
        <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
          {!! Form::label('slug', 'Indonesia Href :') !!}
          {!! url('/') .'/'. Form::text('href_id', Input::old('href_id'), ['class'=>'slug','readonly'=>'readonly','id' => 'href_id']) !!}
          <small class="text-danger">{!! $errors->first('slug') !!}</small>
        </div>
        <div class="form-group">
          <label>Nama Categories (Indonesia)</label>
            {!! Form::text('cat_id', Input::old('cat_id'), ['class'=>'form-control required', 'id'=>'cat_id', 'required'=>'required']) !!}
        </div>
        <div class="form-group">
          <label>Deskripsi (English)</label>
             {!! Form::text('description_en', Input::old('description_en'), ['class'=>'form-control required', 'id'=>'description_en']) !!}
        </div>
        <div class="form-group">
          <label>Deskripsi (Indonesia)</label>
             {!! Form::text('description_id', Input::old('description_id'), ['class'=>'form-control required', 'id'=>'description_id']) !!}
        </div>
        <button type="submit" class="btn btn-success button-next row">Save</button>
        <div class="clear"></div>
      </div>
      {{ Form::close() }}
    </div>
    </fieldset>
    <div class="clear"></div>
</div>
@section('footer')
@parent
<script>
  $("#cat_id").keyup(function(){
    var str = sansAccent($(this).val());
    str = str.replace(/[^a-zA-Z0-9\s]/g,"");
    str = str.toLowerCase();
    str = str.replace(/\s/g,'-');
    $("#href_id").val(str);        
  });

  $("#cat_en").keyup(function(){
    var str = sansAccent($(this).val());
    str = str.replace(/[^a-zA-Z0-9\s]/g,"");
    str = str.toLowerCase();
    str = str.replace(/\s/g,'-');
    $("#href_en").val(str);        
  });

</script>
@show 