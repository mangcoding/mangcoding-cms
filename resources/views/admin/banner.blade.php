<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
            <h1 class="page-header">{{ Request::segment(3)? ucfirst(Request::segment(3)) : ucfirst(Request::segment(2)) }}</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="40%">Banner</th>
                            <th width="20%">Title</th>
                            <th width="15%">Position</th>
                            <th width="21%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>
                            {{ $post->link }} <br/>
                            <img src="{{ url('uploads/banner/'.$post->banner) }}" width="100%" alt=""></td>
                            <td>{{ $post->title_en }} <br />{{ $post->title_id }}</td>
                            <td>{{ App\Setting::banner()[$post->position] }}</td>
                            <td>
                            <a href="{{ action('Admin\Banners@edit', $post->id) }}"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
                            <a href="{{ url('admin/banner/delete/'.$post->id) }}" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-times fa-fw"></i> Delete</a>
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
