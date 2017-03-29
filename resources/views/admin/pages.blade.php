<?php
$href = Request::segment(2);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
            <h1 class="page-header">{{ Request::segment(3)? ucfirst(Request::segment(3)) : ucfirst(Request::segment(2)) }}</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="30%">Title ID</th>
                            <th width="30%">Title EN</th>
                            <th width="11%">Categories</th>
                            <th width="21%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $post->title_id }}</td>
                            <td>{{ $post->title_en }}</td>
                            <td>{{ $post->pagetype }}</td>
                            <td>
                            <a href="{{ url('admin/'.$href.'/'.$post->idPages.'/edit') }}"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
                            <a href="{{ url('admin/'.$href.'/delete/'.$post->idPages) }}" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-times fa-fw"></i> Delete</a>
                            <a href="{{ $post->href_id != null ? url($post->href_id) : '/' }}" target="_blank"><i class="fa fa-eye fa-fw"></i> View</a>
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
