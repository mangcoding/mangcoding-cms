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
                            <th width="20%">Images</th>
                            <th width="40%">Seminar</th>
                            <th width="20%">Price</th>
                            <th width="14%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $seminar)
                        <tr>
                            <td>{{ $x }}</td>
                            <td><img src="{!! $seminar->images !!}" width="100%" alt=""></td>
                            <td><strong>{!! $seminar->title."</strong><p>".str_limit($seminar->description , 200)."
                            <p> <label>Tempat : </label>".$seminar->place." 
							<br /> <label>Contact : </label>".$seminar->phone." 
							<br /> <label>Date : </label>".$seminar->eventDate
                            !!}

                            @if ($seminar->attachment != "")
                                <br> <label>Attachment : </label><a href="{{ url("uploads/attachment/".$seminar->attachment) }}"><i class="fa fa-file-pdf-o fa-fw">{{ $seminar->attachment }}</i></a>
                            @endif
                            </td>
                            <td>
                            	<p class="infoHarga">
                            		- Member : {{ Helpers::number($seminar->memberPrice) }}
                            		<?PHP
                            		$categories = \App\Seminarpack::where(["idSeminar"=>$seminar->idSeminar])->get();
                            		?>
                            		@if (count($categories) > 0)
                            			@foreach ($categories as $categories)
                            				<br />- {{ $categories->categories." : ".Helpers::number($categories->price) }}
                            			@endforeach	
                            		@else
                            		<br />- Reguler : {{ Helpers::number($seminar->price) }}
                            		@endif
                            	</p>
                            </td>
                            <td>
                            <a href="{{ action('Admin\Seminars@edit', $seminar->idSeminar) }}"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
                            <a href="{{ url('admin/seminar/delete/'.$seminar->idSeminar) }}" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-times fa-fw"></i> Delete</a>
                            <p><br />
                                <a href="{{ url('admin/seminar/member/'.$seminar->idSeminar) }}" class="btn btn-block btn-primary">
                                    <i class="fa fa-user"></i> Lihat Peserta
                                </a>
                            </p>
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