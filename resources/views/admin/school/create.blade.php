@extends('admin.includes.main')
@section('title')School -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add School</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add School</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('schools.index')}}" class="btn btn-success ">View School</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('schools.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">School Name</label> <span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Address</label>
                                        <textarea name="address" class="form-control">{{old('address')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Email</label> <span class="text-danger"> * </span>
                                            <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Number</label> <span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="number" value="{{old('number')}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Principal Name</label> <span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="principal_name" value="{{old('principal_name')}}" required>
                                    </div>
                                </div>

                            </div>


                            <div class="text-xl-end">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('address', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
    $(document).ready(function (e) {
        $('#image').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

            $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });
    });
@endsection



