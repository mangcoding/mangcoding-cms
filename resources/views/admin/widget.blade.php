<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
            <h1 class="page-header">{{ Request::segment(3)? ucfirst(Request::segment(3)) : ucfirst(Request::segment(2)) }}</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="30%">Widget Name</th>
                            <th width="30%">Title</th>
                            <th width="21%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $post->widgetName }}</td>
                            <td>{{ $post->title_en }} <br />{{ $post->title_id }}</td>
                            <td>
                            <a href="{{ action('Admin\Widgets@edit', $post->widgetid) }}"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
                            <a href="{{ action('Admin\Widgets@destroy', $post->widgetid) }}" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-times fa-fw"></i> Delete</a>
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
