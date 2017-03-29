<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
            <h1 class="page-header">{{ Request::segment(3)? ucfirst(Request::segment(3)) : ucfirst(Request::segment(2)) }}</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="35%">SettingName</th>
                            <th width="45%">SettingValue</th>
                            <th width="16%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $post->settingName }}</td>
                            <td>{{ $post->settingValue }}</td>
                            <td>
                            <a href="{{ action('Admin\Settings@edit', $post->id) }}"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
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
