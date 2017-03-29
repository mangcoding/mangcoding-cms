<div class="panel-body tab-pane" id="tab3">
  <div class="form-horizontal"> 
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.edu') }}</label>
      <div class="col-sm-9">
        {!! Form::select('edu[0][education]', \App\Setting::education(), Input::old('edu[0][education]'), ['id'=>'edu[0].education', 'class'=>'form-control wpcf7-form-control wpcf7-select required']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.schoolName') }}</label>
      <div class="col-sm-9">
       {!! Form::text('edu[0][eduName]', Input::old('edu[0][eduName]'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'edu[0].eduName']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.mayor') }}</label>
      <div class="col-sm-9">
       {!! Form::text('edu[0][eduMayor]', Input::old('edu[0][eduMayor]'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'edu[0].eduMayor']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.yearIn') }}</label>
      <div class="col-sm-9">
       {!! Form::text('edu[0][eduYear]', Input::old('edu[0][eduYear]'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'edu[0].eduYear']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.yearOut') }}</label>
      <div class="col-sm-9">
       {!! Form::text('edu[0][eduGraduated]', Input::old('edu[0][eduGraduated]'), ['class'=>'form-control wpcf7-form-control wpcf7-text required', 'id'=>'edu[0].eduGraduated']) !!}
      </div>
    </div>
    <div class="pull-right">
      <button class="btn more addButton" type="button" ><i class="fa fa-plus fa-fw"></i>{{ trans('form.plus') }}</button>
    </div>
    <div class="clear"></div>
  </div>
  <div class="form-horizontal hide" id="eduTemplate"> 
    <div class="panel-heading row"><h4>{{ trans('form.eduOptional') }}</h4></div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.edu') }}</label>
      <div class="col-sm-9">
        {!! Form::select('education', \App\Setting::education(), '', ['class'=>'form-control wpcf7-form-control wpcf7-select', 'disabled'=>'disabled']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.schoolName') }}</label>
      <div class="col-sm-9">
       {!! Form::text('eduName', '', ['class'=>'form-control wpcf7-form-control wpcf7-text', 'disabled'=>'disabled']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.mayor') }}</label>
      <div class="col-sm-9">
       {!! Form::text('eduMayor', '', ['class'=>'form-control wpcf7-form-control wpcf7-text', 'disabled'=>'disabled']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.yearIn') }}</label>
      <div class="col-sm-9">
       {!! Form::text('eduYear', '', ['class'=>'form-control wpcf7-form-control wpcf7-text', 'disabled'=>'disabled']) !!}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">{{ trans('form.yearOut') }}</label>
      <div class="col-sm-9">
       {!! Form::text('eduGraduated', '', ['class'=>'form-control wpcf7-form-control wpcf7-text', 'disabled'=>'disabled']) !!}
      </div>
    </div>
    <div class="pull-right">
      <button class="btn more removeButton" type="button" ><i class="fa fa-minus fa-fw"></i>{{ trans('form.eraser') }}</button>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>

@section('footer')
@parent
<script>
  $(document).ready(function() {
   var bookIndex = 0;
   $('#tab3')
   .on('click', '.addButton', function() {
        bookIndex++;
        var $template = $('#eduTemplate'),
            $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id')
                            .attr('data-book-index', bookIndex)
                            .insertBefore($template);

        // Update the name attributes
        $clone
            .find('[name="education"]').attr('name', 'edu[' + bookIndex + '][education]').removeAttr('disabled').addClass('required').end()
            .find('[name="eduName"]').attr('name', 'edu[' + bookIndex + '][eduName]').removeAttr('disabled').addClass('required').end()
            .find('[name="eduMayor"]').attr('name', 'edu[' + bookIndex + '][eduMayor]').removeAttr('disabled').addClass('required').end()
            .find('[name="eduYear"]').attr('name', 'edu[' + bookIndex + '][eduYear]').removeAttr('disabled').addClass('required').end()
            .find('[name="eduGraduated"]').attr('name', 'edu[' + bookIndex + '][eduGraduated]').removeAttr('disabled').addClass('required').end();
      })
   .on('click', '.removeButton', function() {
          var $row  = $(this).parents('.form-horizontal'),
              index = $row.attr('data-book-index');
          $row.remove();
      });
  });
</script>
@stop