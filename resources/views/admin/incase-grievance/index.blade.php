@extends('admin.includes.main')
@section('title')In Case Of Grievance -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">In Case Of Grievance</li>
                    </ol>
                </div>
                <h4 class="page-title">In Case Of Grievance</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @if ($grievance!=null)
    <form action="{{route('in-case-of-grievance.update',$grievance->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    @else
    <form action="{{route('in-case-of-grievance.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    @endif
        <div class="row">
            @include('admin.includes.message')
            <div class="col-xxl-5 col-lg-5">
                <!-- project card -->
                <div class="card d-block h-600">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="primary-color" class="form-label">Title (max characters:50):</label><span class="text-danger"> * </span>
                                <input type="text" class="form-control" name="title" value="{{old('title',$grievance!=null ? $grievance->title : '')}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="primary-color" class="form-label">Email :</label>
                                <input type="email" class="form-control" name="email" value="{{old('email',$grievance!=null ? $grievance->email : '')}}" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="primary-color" class="form-label">Phone :</label>
                                <input type="text" class="form-control" name="phone[]" data-role="tagsinput" value="{{ old('phone[]',$grievance!=null ? $grievance->phone : '') }}">
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                    
                </div> <!-- end card-->

                
                <!-- end card-->
            </div> <!-- end col -->

            <div class="col-lg-7 col-xxl-7">
                <div class="card h-600">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Content:<span class="text-danger"> * </span></h5>
                        <textarea name="content" required>{{old('content',$grievance!=null ? $grievance->content : '')}}</textarea>
                        
                    </div>
                </div>
                <!-- end card-->

            </div>
        </div>
        <div class="btn-group mb-2 ms-2">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>
    </form>
    <!-- end row -->
    
</div> <!-- container -->

@endsection
@section('scripts')

<script type="text/javascript">
            
    $(document).ready(function (e) {
        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    });
    
</script>

@endsection




