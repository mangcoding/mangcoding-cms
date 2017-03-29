@if (isset($post))
<div class="modal-header header-description">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
      <span><a href="#">X</a></span>
    </button>
    <div class="post-title pop-title">
      <h3><a href="#">{{ $post->nama }}</a>
        <span>Nomer Invoice : {{ $post->invoiceNomber }}</span>
      </h3>
    </div>
    <div class="post-info pop-info">
      <i class="fa fa-calendar fa-fw"></i>&nbsp;{{ Helpers::indonesian_date($post->created_at, "d F  Y","") }}
      <i class="fa fa-phone-square fa-fw"></i>&nbsp;{{ $post->phoneNumber }}
      <i class="fa fa-map-marker fa-fw"></i>&nbsp;{{ $post->institution }}
      <p style="padding:15px 0px">
        <a href="{{ url('admin/remail/'.$post->invoiceNomber) }}" class="btn btn-info"><i class="fa fa-envelope" aria-hidden="true"></i> Kirim Email Registrasi</a> &nbsp; &nbsp;
        <a href="{{ url('admin/rekonfirm/'.$post->invoiceNomber) }}" class="btn btn-info"><i class="fa fa-share" aria-hidden="true"></i> Kirim Email Approval</a>
      </p>
    </div>
</div>
<div class="modal-body body-description row">
      @if ($post->status ==1)
     <p><label class="col-md-4">No. Peserta</label> : {{ $post->noPeserta }} </p>
      @endif
     <p><label class="col-md-4">Email</label> : {{ $post->email }} </p>
     <p><label class="col-md-4">Seminar yang diikuti</label> : {{ $post->seminar }} </p>
     <p><label class="col-md-4">Categories </label>: {{ $post->categories }} </p>
     <p><label class="col-md-4">Harga </label>: {{ Helpers::number($post->nominal) }}</p>
      @if ($post->status !=0)
     <p><label class="col-md-4">Bank Pengirim </label>: {{ $post->bankFrom }}</p>
     <p><label class="col-md-4">Bank Tujuan </label>: {{ $post->bankTo }}</p>
     <p><label class="col-md-4">Tanggal Transfer </label>: {{ Helpers::indonesian_date($post->transferDate, "d F  Y") }}</p>
     <p><label class="col-md-4">Tanggal Konfirmasi </label>: {{ Helpers::indonesian_date($post->confirmDate, "d F  Y H:i","WIB") }}</p>
      @endif
      @if ($post->attachment != "")
         <p><label class="col-md-4">Attachment </label>: <a href="{{ url("uploads/attachment/".$post->attachment) }}"><i class="fa fa-file-pdf-o fa-fw">&nbsp;{{ $post->attachment }}</i></a></p>
      @endif 
       <p><label class="col-md-4">
Abtract Topic Plan to Present in the Present*</label>: {{ $post->topicPlan }}</p>
</div>    <!-- /modal-body -->
<div class="modal-footer action-description a-description">
  @if (isset($approve))

     {!! Form::open(['action' => ['Admin\Registrants@postApprove'], 'files' => true ]) !!}
        <div class="col-md-12 row">
          <div class="form-group">
            <label class="col-md-16 pull-left">No. Peserta</label>
              {!! Form::text('noPeserta', Input::old('noPeserta'), ['class'=>'form-control required','required'=>'required']) !!}
          </div>
          <div class="form-group">
            <input type="hidden" name="noInvoice" value="{{$post->invoiceNomber}}" />
            @if ($post->confirmAttach != "")
            <a href="{{$post->confirmAttach}}" target="_blank" class="btn btn-info pull-left">BUKTI TRANSFER</a>
            @endif
            <button type="submit" data-toggle="modal" class="btn btn-info pull-left">KONFIRMASI</button>
          </div> 
        </div>
      </form>
  @else
    @if ($post->confirmAttach != "")
        <a href="{{$post->confirmAttach}}" target="_blank" class="btn btn-info pull-left">BUKTI TRANSFER</a>
    @endif
    @if ($post->status==0)
        <button type="button" class="btn btn-primary">New Registration</button>
    @elseif ($post->status==1)
        <button type="button" class="btn btn-success">Approved</button>
    @elseif ($post->status==2)
        <button type="button" class="btn btn-info">Waiting Approval</button>
    @endif
  @endif 
  </div> 
@endif
