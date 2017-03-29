<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
            <h1 class="page-header">
                {{ Request::segment(3)? ucfirst(Request::segment(3)) : ucfirst(Request::segment(2)) }}
            </h1>
            <div class="table-responsive">
                <a href="{{ url('admin/bank/create') }}" class="btn btn-primary pull-right">
                    <i class="fa fa-university fa-fw"></i> 
                    Tambah Nomor Rekening
                </a>
                <div class="clearfix"></div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="25%">Nama Bank</th>
                            <th width="25%">Nama Akun</th>
                            <th width="25%">Nomor Rekening</th>
                            <th width="21%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $post->bankName }}</td>
                            <td>{{ $post->bankAccount }}</td>
                            <td>{{ $post->bankRec }}</td>
                            <td>
                            <a href="{{ action('Admin\Banks@edit', $post->id) }}"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
                            <a href="{{ url('admin/bank/delete/'.$post->id) }}" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-times fa-fw"></i> Delete</a>
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
