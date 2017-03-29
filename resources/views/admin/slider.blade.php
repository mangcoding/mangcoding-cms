<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
            <h1 class="page-header">{{ Request::segment(3)? ucfirst(Request::segment(3)) : ucfirst(Request::segment(2)) }}</h1>
            <div class="table-responsive">
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
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="40%">Slider</th>
                            <th width="20%">Title</th>
                            <th width="15%">link</th>
                            <th width="21%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $x }}</td>
                            <td><img src="{{ url('uploads/slider/'.$post->images) }}" width="100%" alt=""></td>
                            <td>{{ $post->title_en }} <br />{{ $post->title_id }}</td>
                            <td>{{ $post->link }}</td>
                            <td>
                            <a href="{{ action('Admin\Sliders@edit', $post->idslider) }}"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
                            <a href="{{ url('admin/slider/delete/'.$post->idslider) }}" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-times fa-fw"></i> Delete</a>
                            </td>
                        </tr>
                        <?PHP $x++; ?>
                        @endforeach
                    </tbody>
                </table>
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
</div>
