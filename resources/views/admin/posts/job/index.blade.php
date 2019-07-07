@extends('admin.main')
@section('content')
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header" id="top">
                            <h2 class="pageheader-title">All Job</h2>
                        </div>
                    </div>
		<div class="col-md-12">
			<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Logo</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Company Name</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($jobs as $job)
                                            <tr>
                                                <th scope="row">{{ $job->id }}</th>
                                                <th><img style="max-height: 50px;" src="{{ url('/') }}/images/{{ $job->logo }}" alt="Logo"></th>
                                                <td>{{ $job->title }}</td>
                                                <td>{{ $job->company_name }}</td>
                                                <td>{{ $job->location }}</td>
                                                <td>
                                                	<a class="btn btn-outline-primary" href="{{ route('getUpdate', $job->id) }}">Edit</a>
                                                	<form action="{{ route('jobDelete', $job->id) }}" method="POST">
                                                		@csrf
													<button onclick="return confirmDelete()" class="btn btn-outline-danger" >Delete</button>
													</form>
                                                </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
		</div>
	</div>
</div>
</div>
<script>
	function confirmDelete(){
		var con = confirm('Do you want to delete?');
		if(con == true){
			return true;
		}else{
			return false;
		}
	}
</script>
@endsection