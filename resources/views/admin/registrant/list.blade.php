<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
            <h1 class="page-header">{{ Request::segment(3)? ucfirst(Request::segment(3)) : ucfirst(Request::segment(2)) }}</h1>
            <div class="table-responsive">
            	@if ($alert = Session::get('message'))
	                <div class="alert alert-success">
	                    {{ $alert }}
	                </div>
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
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="20%">No. Invoice</th>
                            <th width="20%">Nama</th>
                            <th width="17%">Email/Phone</th>
                            <th width="17%">Institution</th>
                            <th width="23%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $seminar)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $seminar->id }}<br />
                                @if ($seminar->status==0)
                                    <span class="status info">New Resgitration</span>
                                @elseif ($seminar->status==2)
                                    <span class="status success">Waiting Approval</span>
                                @endif
                            </td>
                            <td>{{ $seminar->nama }}
                            @if ($seminar->attachment != "")
                                <br><a href="{{ url("uploads/attachment/".$seminar->attachment) }}"><i class="fa fa-file-pdf-o fa-fw">&nbsp;{{ $seminar->attachment }}</i></a>
                            @endif                            
                            </td>
                            <td>{{ $seminar->email }}<br />{{ $seminar->phoneNumber }}</td>
                            <td>{{ $seminar->institution }}</td>
                            <td>
                            @if ($seminar->status !=1)
                                <a data-toggle="modal" href="{{ action('Admin\Registrants@approve', $seminar->id) }}" class="btn btn-outline btn-primary btn-sm" data-target="#myModal"><i class="fa fa-check fa-fw"></i> Approve</a>
                            @endif
                            <a data-toggle="modal" href="{{ action('Admin\Registrants@show', $seminar->id) }}" class="btn btn-outline btn-primary btn-sm" data-target="#myModal"><i class="fa fa-eye fa-fw"></i> Detail</a>
                            </td>
                        </tr>
                        <?PHP $x++; ?>
                        @endforeach
                    </tbody>
                </table>
                {!! $posts->render() !!}
            </div>
            <div class="col-md-12">
              <p class="convert-act col-md-offset-4 col-md-4">Convert to : 
                <a href="{{ $exportExcel }}" class="btn btn-excel btn-success"><i class="fa fa-file-excel-o fa-fw"></i> Excel</a>
              </p>
            </div>
        </div>
    </div>
</div>