@if (isset($errors) && count($errors) > 0)
<div class="bg-warning">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if ($sukses = Session::get('msg'))
    <div class="flash-message"> 
        <div class="alert alert-success">
            {{ $sukses }}
        </div>
    </div>
@endif