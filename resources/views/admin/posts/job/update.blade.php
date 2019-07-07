@extends('admin.main')
@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header" id="top">
                            <h2 class="pageheader-title">Edit job </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Post job Form</h5>
                            <div class="card-body">
                                <form action="{{ route('update', $update->id) }}" method="POST" enctype="multipart/form-data">
                                	@csrf
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Title</label>
                                        <input id="inputText3" value="{{ $update->title }}" type="text" class="form-control" name="title">
                                    </div>
                                               <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Company name</label>
                                        <input id="inputText3" value="{{ $update->company_name }}" type="text" class="form-control" name="company_name">
                                    </div>
                                        <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Location</label>
                                        <input id="inputText3" value="{{ $update->location }}" type="text" class="form-control" name="location">
                                    </div>
                                    <div class="custom-file">
                                     <label class="custom-file-label" for="customFile">Logo</label>
                                        <input type="file" class="custom-file-input" id="customFile" name="logo">
                                        <img style="max-height: 70px;" src="{{ url('/') }}/images/{{ $update->logo }}" alt="">
                                        <br>
                                        <br>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Job description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description">{{ $update->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                    	<button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection