@extends('admin.includes.main')

@section('title')Add Document -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Add Document</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Document</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('demand-document.index')}}" class="btn btn-success ">View Documents</a>
                        </div>
                    </div>
                    @include('admin.includes.message')
                    <form action="{{route('demand-document.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-5 col-xxl-5">
                                <div class="card h-600">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="title">Title</label><span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="image">Image</label><br>
                                            <input type="file" name="image" id="image" class="form-control" >
                                        </div>
                                        <div>
                                            <img id="preview-image-before-upload"  style="max-height:150px;">
                                        </div> --}}
                                    </div>
                                </div>
                                <!-- end card-->
                
                            </div>
                
                            <div class="col-lg-7 col-xxl-7">
                                <div class="card h-600">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Content <span class="text-danger"> * </span></h5>
                                        <textarea name="content" required>{{old('content')}}</textarea>
                                        
                                    </div>
                                </div>
                                <!-- end card-->
                
                            </div>
                        </div>
                        <div class="btn-group mb-2 ms-2">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });  
    $(document).ready(function (e) {
    
    
    $('#image').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
    
</script>
@endsection


