@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)
@extends('theme::layouts.default')
@section('content')
	<div class="main-title" style="background-color: #f2f2f2; ">
		<div class="container">
			<h1 class="main-title__primary">{{ $title }}</h1>
		</div>
	</div>
	{!! Breadcrumbs::render('pages','seminar') !!}
	<div class="master-container">
		<div class="container">
			<div class="">
				<main class="col-xs-12  col-md-9" role="main">
					<div class="row">
						<div class="col-xs-12">
							<article class="post tformat-standard hentry">
								@include("theme::partial.message")
								<div id="comments">
									<div id="respond" class="comment-respond">
										@if (isset($token))
										{!! Form::model($token, ['action' => ['Seminars@postConfirm'], 'files' => true]) !!}
										@else		
										{!! Form::open(['action'=>'Seminars@postConfirm','files' => true, "id"=>"commentform","class"=>"comment-form"]) !!}
										@endif
											<p class="comment-notes">
												<span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
											</p>	
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group">
													 <label for="pwd">No. Invoice</label>
                   										{!! Form::text('invoiceNumber', Input::old('invoiceNumber'), ['class'=>'form-control required']) !!}
												</div>
											</div>	
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group">
													<label for="pwd">Bank Pengirim</label>
                   									{!! Form::text('bankPengirim', Input::old('bankPengirim'), ['class'=>'form-control required']) !!}
                   									<span>Ex : BCA</span>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group">
													<label for="pwd">Rekening Pengirim</label>
                   									{!! Form::text('rekPengirim', Input::old('rekPengirim'), ['class'=>'form-control required']) !!}
                       							    <span>Ex : 4562930291XXX a.n Jhon Dave</span>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group">
													<label for="pwd">Bank Tujuan</label>
                  									{!! Form::select('bankTujuan', $bankTujuan, Input::old('bankTujuan'), ['class'=>'form-control required']) !!}
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group">
													<label for="pwd">Tanggal Transfer</label>
                									{!! Form::text('transferDate', Input::old('transferDate'), ['class'=>'form-control required datepicker']) !!}
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-5 form-group">
													<label for="pwd">Bukti Tranfer Transfer</label>
                									{!! Form::file('bukti', ['class'=>'form-control','id'=>'bukti']) !!}
												</div>
											</div>	
											<div class="row">
												<div class="col-xs-12 col-sm-5 form-group">
											      <label for="captcha">{!! captcha_img('flat') !!}
											      <span class="theme-clr">*</span></label>
											       {!! Form::text('captcha', null, ['class'=>'form-control 	required', 'id'=>'captcha']) !!}
											    </div>
											</div>
											<p class="form-submit">
												<input name="submit" type="submit" id="comments-submit-button" class="submit" value="Konfirmasi Sekarang"/>
											</p>
										</form>
									</div>
								</div>
							</article>
						</div><!-- /blogpost -->
					</div>
				</main>
				<div class="col-xs-12  col-md-3">
					<div class="sidebar">
						{!! app('App\Banner')->showBanner(3) !!}
						<div class="clearfix"></div>
						@include("theme::widgets.twitter")
						<div class="clearfix"></div>
						@include("theme::widgets.visitors")
						{!! app('App\Banner')->showBanner(2) !!}
					</div>
				</div>
			</div>
		</div><!-- /container -->
	</div>
@stop

@section('head')
@parent
<link href="{{ Url::asset('themes/iiha/assets/js/calender/jquery-ui.css') }}" rel="stylesheet" />
@stop

@section('footer')
@parent
<script src="{{ Url::asset('themes/iiha/assets/js/wizard/prettify.js') }}"></script>
<script src="{{ Url::asset('themes/iiha/assets/js/calender/jquery-ui.js') }}"></script>
<script>
$(document).ready(function() {
   $('.datepicker').datepicker({
         dateFormat: "yy-mm-dd",
         changeMonth: true,
         changeYear: true,
         yearRange: "-100:+0"
   })

   $('form').submit(function(){ 
        $('form').find('input.required').each(function() {
            var ok = $(this).val();
            if (ok == "") {
                $(this).parent().addClass("has-error");
            }else{
                $(this).parent().removeClass("has-error");
            }
        });

        $('form').find('input:radio.required').each(function() {
            pilihan = $(this).attr("name");
            pilihan = $('input[name="'+pilihan+'"]');
            if (pilihan.is(':checked') == false) {
                pilihan.parent().parent().parent().addClass("has-error");
            }else{
                pilihan.parent().parent().parent().removeClass("has-error");
            }
        });

        if ($('form').find( ".form-group" ).hasClass( "has-error" ) == true) {
            return false;
        }
        else 
            return true;
    });

   $( document ).on( "change", "input[name='idPacks']", function() {
	    var cat = $(this).val();
	    if (cat == "member") {
	    	$('#divIdMember').show();
	    	$('input[name="idMember"]').addClass("required");
	    }else {
	    	$('#divIdMember').hide();
	    	$('input[name="idMember"]').removeClass("required");
	    }
	});
});
</script>
@stop