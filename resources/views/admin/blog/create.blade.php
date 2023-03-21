@extends('admin.includes.main')

@section('title')Add Blog -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Add Blog</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Blog</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('blogs.index')}}" class="btn btn-success ">View Blogs</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Title</label> <span class="text-danger"> * </span>
                                        <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="mb-3">
                                        <label for="tags">Tags</label>
                                        <input type="text" class="form-control" name="tags[]" data-role="tagsinput" >
                                    </div>
                                    
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name">Description</label>
                                        <textarea name="description" class="form-control">{{old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="image">Image</label><br>
                                        <input type="file" name="image" id="image" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label> <span class="text-danger"> * </span>
                                    <input type="radio" name="status" value="1" @if(old('status') == '1') checked @endif> Show
                                    <input type="radio" name="status" value="0" @if(old('status') == '0') checked @endif> Hide
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <img id="preview-image-before-upload"  style="max-height:150px;">
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


@endsection
@section('scripts')
<script type="text/javascript">
    CKEDITOR.replace('description', {
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
    
</script>
@endsection


