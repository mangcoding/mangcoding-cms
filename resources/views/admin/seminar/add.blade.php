<?php
$TinyMCE =  new TinyMCE(url('assets/js/tinymce'));
echo $TinyMCE->load();
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12"> 
            <h1>{{ Request::segment(3) =="create" ? 'Tambah Seminar' : 'Edit Seminar' }}</h1>
		    <fieldset id="addSeminar">	
	        @if (isset($seminar))
                {!! Form::model($seminar, ['action' => ['Admin\Seminars@update', $seminar->idSeminar], 'files' => true]) !!}
            @else
                {!! Form::open(['action' => ['Admin\Seminars@store'], 'files' => true ]) !!}
            @endif
            @if ($alert = Session::get('message'))
                <div class="alert alert-success">
                    {{ $alert }}
                </div>
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
            <div class="form-group file">
                <label class="label-center">
                    @if (isset($seminar))
                        <img src="{{ $seminar->images }}" width="30%" id="gambar" />
                    @else
                        Upload Cover
                    @endif
                </label>
                @if (isset($seminar))
                    {!! Form::file('gambar', ['class'=>'form-control','id'=>'avatar']) !!}
                @else
                    {!! Form::file('gambar', ['class'=>'form-control required','id'=>'avatar']) !!}
                @endif
            </div>
            <div class="form-group">
                <label>Title</label>
                {!! Form::text('title', Input::old('title'), ['class'=>'form-control required']) !!}
            </div>
            <div class="form-group">
                <label>Description</label>
                {!! Form::textarea('description', Input::old('description'), ['class'=>'form-control required tinymce']) !!}
            </div>
            <div class="form-group row">
                <label class="col-md-12">Tanggal Seminar</label>
                <div class="col-md-6">
                    {!! Form::text('eventDate', Input::old('eventDate'), ['class'=>'datepicker form-control required','placeholder' => 'Tanggal, ex: yyyy-mm-dd']) !!}  
                </div>

                <div class="col-md-6">
                    {!! Form::text('eventHours', Input::old('eventHours'), ['class'=>'form-control required', 'placeholder' => 'Jam, ex : 10:00 AM' ]) !!}
                </div>
            </div>
            <div class="form-group">
                <label>Tanggal Pembukaan</label>
                {!! Form::text('openRegist', Input::old('openRegist'), ['class'=>'datepicker form-control required']) !!}
            </div>
            <div class="form-group">
                <label>Tanggal Penutupan</label>
                {!! Form::text('closeRegist', Input::old('closeRegist'), ['class'=>'datepicker form-control required']) !!}
            </div>
            <div class="form-group">
                <label>Tempat</label>
                {!! Form::text('place', Input::old('place'), ['class'=>'form-control required']) !!}
            </div>
            <div class="form-group">
                <label>Contact</label>
                {!! Form::text('contact', Input::old('contact'), ['class'=>'form-control required']) !!}
            </div>
            <div class="checkbox form-group">
                <label>
                {!! Form::checkbox('package','1',Input::old('package')) !!} <strong> Tambahkan Categories </strong>
                </label>    
            </div> 
            @if (isset($seminar))
                <?PHP
                    $categories = \App\Seminarpack::where(["idSeminar"=>$seminar->idSeminar])->get();
                ?>
                @if (count($categories) > 0)
                    @foreach ($categories as $categories)
                        <div class="form-group" id="packet">
                            <div class="col-md-4 row">
                                {!! Form::text('cateold['.$categories->idPacks.'][categories]', $categories->categories, ['class'=>'form-control','placeholder' => 'Masukkan Categories']) !!}  
                            </div>

                            <div class="col-md-4">
                                {!! Form::text('cateold['.$categories->idPacks.'][price]', $categories->price, ['class'=>'form-control', 'placeholder' => 'Masukkan harga']) !!}
                            </div>

                            <div class="col-md-4">
                              <button class="btn btn-primary addButton" type="button" ><i class="fa fa-plus fa-fw"></i>{{ trans('form.plus') }}</button>
                              <a class="btn btn-primary" href="{{ url('admin/seminar/delcat/'.$categories->idPacks) }}"><i class="fa fa-minus fa-fw"></i>{{ trans('form.eraser') }}</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    @endforeach 
                @else
                    <div class="form-group" id="regular" {{ Input::old('package') == '1' ? 'style="display:none"' : '' }}>
                        <label>Harga Reguler</label>
                        {!! Form::text('price', Input::old('price'), ['class'=>'form-control required']) !!}
                    </div>
                @endif
            @else
            <div class="form-group" id="regular" {{ Input::old('package') == '1' ? 'style=display:none' : '' }}>
                <label>Harga Reguler</label>
                {!! Form::text('price', Input::old('price'), ['class'=>'form-control required']) !!}
            </div>     
            <div class="form-group" id="packet" {{ Input::old('package') == '1' ? : 'style=display:none' }}>
                <div class="col-md-4 row">
                    {!! Form::text('cate[0][categories]', Input::old('cate[0][categories]'), ['class'=>'form-control required','placeholder' => 'Masukkan Categories']) !!}  
                </div>

                <div class="col-md-4">
                    {!! Form::text('cate[0][price]', Input::old('cate[0][price]'), ['class'=>'form-control required', 'placeholder' => 'Masukkan harga']) !!}
                </div>

                <div class="col-md-4">
                  <button class="btn more addButton" type="button" ><i class="fa fa-plus fa-fw"></i>{{ trans('form.plus') }}</button>
                </div>
                <div class="clear"></div>
            </div>
            @endif
            <div class="form-group" id="beforeTemplate">
                <label>Harga Member</label>
                {!! Form::text('memberPrice', Input::old('memberPrice'), ['class'=>'form-control required']) !!}
            </div>
            <div class="form-group" id="beforeTemplate">
                <label>
                @if (isset($seminar) && $seminar->attachment != "")
                    <label>Attachment : </label> <a href="{{ url("uploads/attachment/".$seminar->attachment) }}"><i class="fa fa-file-pdf-o fa-fw">{{ $seminar->attachment }}</i></a>
                @else
                    Attachment Files
                @endif
                </label>
                {!! Form::file('attach', ['class'=>'form-control','id'=>'attach']) !!}
            </div>
	        <div class="form-group">
	        	<button class="btn btn-primary pull-right" type="submit">Save Settings</button>
	        </div>
	        </form>
		</fieldset>
		<div class="clear"></div>
	</div>
</div>
<div class="form-group hide" id="template">
    <div class="col-md-4 row">
        {!! Form::text('categories', Input::old('categories'), ['class'=>'form-control','placeholder' => 'Masukkan Categories','disabled'=>'disabled']) !!}  
    </div>

    <div class="col-md-4">
        {!! Form::text('catPrice', Input::old('catPrice'), ['class'=>'form-control', 'placeholder' => 'Masukkan harga','disabled'=>'disabled']) !!}
    </div>

    <div class="col-md-4">
      <button class="btn btn-primary addButton" type="button" ><i class="fa fa-plus fa-fw"></i>{{ trans('form.plus') }}</button>
      <button class="btn btn-primary removeButton" type="button" ><i class="fa fa-minus fa-fw"></i>{{ trans('form.eraser') }}</button>
    </div>
    <div class="clear"></div>
</div>
<script>
  $(document).ready(function() {
    $( document ).on( "change", "input[name='package']", function() {
        if ($('input[name="package"]').is(':checked') == true) {
            $('#packet').show();
            $('#regular').hide();
            $('input[name="price"]').removeClass('required');
            $('input[name="cate[0][categories]"]').addClass('required');
            $('input[name="cate[0][price]"]').addClass('required');
        }else{
            $('#packet').hide();
            $('#regular').show();
            $('input[name="price"]').addClass('required');
            $('input[name="cate[0][categories]"]').removeClass('required');
            $('input[name="cate[0][price]"]').removeClass('required');
        }
    });

   var bookIndex = 0;
   $('#addSeminar').on('click', '.addButton', function() {
        bookIndex++;
        var $template = $('#template'),
            $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id')
                            .attr('data-book-index', bookIndex)
                            .insertBefore($('#beforeTemplate'));

        // Update the name attributes
        $clone
            .find('[name="categories"]').attr('name', 'cate[' + bookIndex + '][categories]').removeAttr('disabled').addClass('required').end()
            .find('[name="catPrice"]').attr('name', 'cate[' + bookIndex + '][price]').removeAttr('disabled').addClass('required').end();
      })
   .on('click', '.removeButton', function() {
          var $row  = $(this).parents('.form-group'),
              index = $row.attr('data-book-index');
          $row.remove();
      });
  });
</script>