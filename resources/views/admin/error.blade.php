@if ($alert = Session::get('message'))
    @if (is_object($alert))
        <div class="alert alert-danger">
            @foreach ($alert->all() as $msg)
            {{ $msg."<br />" }}
            @endforeach
        </div>
    @else
        <div class="alert alert-success">
            {{ $alert }}
        </div>
    @endif
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