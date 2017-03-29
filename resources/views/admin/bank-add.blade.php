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
      @if (isset($bank))
        {!! Form::model($bank, ['action' => ['Admin\Banks@update', $bank->id], 'files' => true]) !!}
      @else
        {!! Form::open(['action' => ['Admin\Banks@store'], 'files' => true,'class'=>'set-profile' ]) !!}
      @endif
      <div class="form-horizontal">
        <div class="form-group">
          <label>Nama Bank</label>
            {!! Form::text('bankName', Input::old('bankName'), ['class'=>'form-control required', 'id'=>'bankName', 'required'=>'required']) !!}
        </div>
        <div class="form-group">
          <label>Nama Akun</label>
             {!! Form::text('bankAccount', Input::old('bankAccount'), ['class'=>'form-control required', 'id'=>'bankAccount']) !!}
        </div>
        <div class="form-group">
          <label>Nomor Rekening</label>
             {!! Form::text('bankRec', Input::old('bankRec'), ['class'=>'form-control required', 'id'=>'bankRec']) !!}
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