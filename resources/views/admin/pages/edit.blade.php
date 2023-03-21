@extends('admin.includes.main')
@section('title')Edit page -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Edit Page</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Page</h4>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('pages.index')}}" class="btn btn-success ">View Page</a>
            </div>
        </div>
        <form action="{{route('pages.update',$page->id)}}" method="post" enctype="multipart/form-data">
            @include('admin.includes.message')
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Title</label> <span class="text-danger"> * </span>
                        <input type="text" class="form-control" name="title" value="{{old('title',$page->title)}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Slug</label><span class="text-danger"> * </span>
                        <input type="text" class="form-control" name="slug" value="{{old('slug',$page->slug)}}">
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="name">Content</label><br>
                        <textarea name="content">{{old('content',$page->content)}}</textarea>
                    </div>
                </div>
            </div> 
            
            <button type="submit" class="btn btn-success btn-sm float-right">Save</button> 
        </form>
    </div>
</div>

@endsection
@section('scripts')
    

<script type="text/javascript">
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    
    
</script>

@endsection