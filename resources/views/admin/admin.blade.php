<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
            <h1 class="page-header">Administrator</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>FullName</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $x }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->fullName }}</td>
                                <td>
                                <a href="{{ action('Admin\AdminController@getEdit', $admin->adminid) }}"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
                                <a href="{{ action('Admin\AdminController@getHapus', $admin->adminid) }}" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-times fa-fw"></i> Delete</a>
                                </td>
                            </tr>
                            <?PHP $x++; ?>  
                            @endforeach
                        </tbody>
                    </table>
                    {{ $admins->render() }}
                </div>
                <!-- /.table-responsive -->
        </div>
    </div>
</div>