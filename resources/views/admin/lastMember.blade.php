<div class="row">
    <div class="col-lg-12"> 
        <h1 class="page-header">Last Member Register</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="4%">No</th>
                        <th width="10%">IDMember</th>
                        <th width="20%">Name</th>
                        <th width="15%">Email</th>
                        <th width="12%">Phone</th>
                        <th width="15%">Perusahaan</th>
                        <th width="24%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                    <tr>
                        <td>{{ $x }}</td>
                        <td>{{ $member->idMember }}</td>
                        <td>{{ $member->prefix." ".$member->fullName.", ".$member->subfix }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->companyName }}</td>
                        <td>
                        <a href="{{ action('Admin\Members@edit', $member->memberid) }}"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
                        <a href="{{ url('admin/member/delete/'.$member->memberid) }}" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-times fa-fw"></i> Delete</a>
                        <a href="{{ url('admin/member/'.$member->memberid) }}"><i class="fa fa-eye fa-fw"></i> View</a>
                        </td>
                    </tr>
                    <?PHP $x++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
