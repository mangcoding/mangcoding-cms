@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)
@extends('theme::layouts.default')
@section('content')
	<div class="main-title" style="background-color: #f2f2f2; ">
		<div class="container">
			<h1 class="main-title__primary">{{ $title }}</h1>
			<!--<h3 class="main-title__secondary">{!! $description !!}</h3>-->
		</div>
	</div>
	{!! Breadcrumbs::render('seminar-detail',$title, $page->idSeminar) !!}
	<div class="master-container">
		<div class="container">
			<div class="row">
				<main class="col-xs-12  col-md-9" role="main">
					<div class="row">
					@if ($page->title != null)
						<div class="col-xs-12">
							<article class="post tformat-standard hentry">
								@include("theme::partial.message")
								@if ($page->images != null)
								<a href="#">
									<img src="{{ $page->images }}" alt="" class="img-responsive wp-post-image" alt="Project Image"/>	
								</a>
								@endif
								<div class="meta-data">
									<label class="col-sm-3 row"><i class="fa fa-calendar fa-fw"></i>Seminar Date </label> : <time datetime="{!! $page->created_at !!}" class="meta-data__date ">{{ Helpers::indonesian_date($page->eventDate, "l, d F Y")." ".$page->eventHours }}</time>
									<div class="clearfix"></div>
									<label class="col-sm-3 row"><i class="fa fa-calendar-check-o fa-fw"></i>Open Registration  </label> :
									{{ Helpers::indonesian_date($page->openRegist, "l, d F Y")}}
									<div class="clearfix"></div>
									<label class="col-sm-3 row"><i class="fa fa-calendar-times-o fa-fw"></i>Close Registration  </label> :
									{{ Helpers::indonesian_date($page->closeRegist, "l, d F Y")}}
									<div class="clearfix"></div>
									<div class="col-sm-3 row">
									<label><i class="fa fa-phone-square fa-fw"></i>Contact </label>
									</div> 
									<div class="col-sm-9 row">
										<strong>{!! $page->contact !!}</strong>
									</div>
									<div class="clearfix"></div>
									<label class="col-sm-3 row"><i class="fa fa-map-marker fa-fw"></i>Location  </label> : {!! $page->place !!}
								</div>
								<h2 class="hentry__title">
									<a href="{{ url('/seminar/'.$page->idSeminar) }}">{{ strtoupper($page->title) }}</a>
								</h2>
								<div class="hentry__content">
									<p>{!! $page->description !!}</p>
								</div>
								@if ($page->attachment !="")
								<div class="hentry__content">
									<h3>Attachment (Download if needed)</h3>
									<p><a href="{{ url('uploads/attachment/'.$page->attachment) }}" target="_blank"><i class="fa fa-file-pdf-o fa-fw"></i>{!! $page->attachment !!}</a></p>
								</div>
								@endif
								<div class="clearfix"></div>

								<div id="comments">
									<h2 class="alternative-heading">Seminar Registration</h2>
									<div id="respond" class="comment-respond">										
										{!! Form::open(['files' => true, "id"=>"commentform","class"=>"comment-form"]) !!}
											<p class="comment-notes">
												<span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
											</p>	
											<div class="row">
												<div class="col-xs-12 col-sm-10 form-group">
													<label for="investmen">Investment Category<span class="theme-clr">*</span></label>
													<div class="radio">
											          <label>{!! Form::radio('idPacks', "member", (Input::old('idPacks')=="member"), ['id' => 'idPacksM', 'class'=>'required']) !!} 
											          Already on IIHA Member ({{ Helpers::number($page->memberPrice) }}) </label>  
											        </div>
													<?PHP
									                    $categories = \App\Seminarpack::where(["idSeminar"=>$page->idSeminar])->get();
									                ?>
									                @if (count($categories) > 0)
									                    @foreach ($categories as $categories)
									                    	<div class="radio">
													          <label>{!! Form::radio('idPacks', $categories->idPacks, (Input::old('idPacks')==$categories->idPacks), ['id' => 'idPacks', 'class'=>'required'])." ". $categories->categories !!} 
													          ({{ Helpers::number($categories->price) }}) </label>
													          @if ($categories->idPacks == 1)
																<div class="row" id="divIdPublic" {!! Input::old('idPacks') == "1" ? : 'style=display:none' !!}>
																	<div class="col-xs-12 col-sm-8 form-group" style="padding-top:10px">
																		<p>Get <b>20% discount</b> by registering as a member of IIHA ({{ Helpers::number($page->memberPrice) }})</p>
																		<div class="checkbox">
																          <label>{!! Form::checkbox('willing', "1", (Input::old('willing')=="1"), ['id' => 'willing', 'class'=>'required']) !!} <b>I'm Willing to become a Member of IIHA </b></label>  
																        </div>	
																	</div>
																</div>
													        @endif
													        </div>
														@endforeach
													@else
													<div class="radio">
											          <label>{!! Form::radio('idPacks', "0", (Input::old('idPacks')=="0"), ['id' => 'idPacks', 'class'=>'required']) !!} Reguler 
											          ({{ Helpers::number($page->price) }}) </label>  
											        </div>	
											        @endif
												</div>
											</div>	
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group" id="divIdMember" {!! Input::old('idPacks') == "member" ? : 'style=display:none' !!}>
													<label for="idMember">idMember <span class="required theme-clr">Optional (Not required)</span></label>
													<input id="idMember" name="idMember" type="text" value="{{ Input::old('idMember') }}" class="form-control"/>
												</div>
											</div>	
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group">
													<label for="nama">First and Last name<span class="required theme-clr">*</span></label>
													<input id="nama" name="nama" type="text" value="{{ Input::old('nama') }}" class="required form-control" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group">
													<label for="email">E-mail Address<span class="required theme-clr">*</span></label>
													<input id="email" name="email" type="email" value="{{ Input::old('email') }}" class="required form-control" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group">
													<label for="institution">Institution/University<span class="required theme-clr">*</span></label>
													<input id="institution" name="institution" type="text" value="{{ Input::old('institution') }}" class="required form-control" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-8 form-group">
													<label for="phoneNumber">Mobile Phone Number<span class="required theme-clr">*</span></label>
													<input id="phoneNumber" name="phoneNumber" type="text" value="{{ Input::old('phoneNumber') }}" class="required form-control" />
												</div>
											</div>
											<!--
											<div class="row">
												<div class="col-xs-12 col-sm-10 form-group">
													<label for="topicPlan">Abstract topic plan to present in the seminar</label>
													<textarea id="topicPlan" name="topicPlan" class="form-control" rows="8">{{ Input::old('topicPlan') }}</textarea>
												</div>
											</div>	
											<div class="row">
												<div class="col-xs-12 col-sm-10 form-group">
													<label for="topicPlan">Attachment (Max : 1MB, greater not uploaded)</label>
													{!! Form::file('attach', ['class'=>'form-control','id'=>'attach']) !!}
												</div>
											</div>
											-->
											<div class="row">
												<div class="col-xs-12 col-sm-5 form-group">
											      <label for="captcha">{!! captcha_img('flat') !!}
											      <span class="theme-clr">*</span></label>
											       {!! Form::text('captcha', null, ['class'=>'form-control 	required', 'id'=>'captcha']) !!}
											    </div>
											</div>
											<p class="form-submit">
												<input name="submit" type="submit" id="comments-submit-button" class="submit" value="Daftar Sekarang"/>
											</p>
										</form>
									</div>
								</div>
							</article>
						</div><!-- /blogpost -->
					@else
						<p>Tidak ada Seminar Aktif Saat ini</p>
					@endif
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

@section('footer')
@parent
<script>
$(document).ready(function() {
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
	    	//$('input[name="idMember"]').addClass("required");

	    	$('#divIdPublic').hide();
	    	$('input[name="willing"]').removeClass("required");
	    }
	    else if (cat == "1") {

	    	$('#divIdPublic').show();
	    	$('input[name="willing"]').addClass("required");

	    	$('#divIdMember').hide();
	    	$('input[name="idMember"]').val("");
	    	$('input[name="idMember"]').removeClass("required");

	    }
	    else {
	    	$('#divIdPublic').hide();
	    	$('input[name="willing"]').removeClass("required");

	    	$('#divIdMember').hide();
	    	$('input[name="idMember"]').val("");
	    	$('input[name="idMember"]').removeClass("required");
	    }
	});
});
</script>
@stop