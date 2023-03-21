@extends('admin.includes.main')
@section('title')Why Us -  {{ config('app.name', 'Laravel') }} @endsection
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
                        <li class="breadcrumb-item active">Why Us</li>
                    </ol>
                </div>
                <h4 class="page-title">Why Us</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @if ($whyus!=null)
    <form action="{{route('why-us.update',$whyus->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    @else
    <form action="{{route('why-us.store')}}" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="title" value="{{old('title',$whyus!=null ? $whyus->title : '')}}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image:</label><span class="text-danger"> * </span><br>
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                @if ($whyus!=null)
                                <img id="preview-image-before-upload"  style="max-height:150px;" src="{{asset('uploads/whyus/'.$whyus->image)}}">
                                @else
                                <img id="preview-image-before-upload"  style="max-height:150px;">
                                @endif
                                
                            </div>
                        </div> 
                        

                    </div> <!-- end card-body-->
                    
                </div> <!-- end card-->

                
                <!-- end card-->
            </div> <!-- end col -->

            <div class="col-lg-7 col-xxl-7">
                <div class="card h-600">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Description:<span class="text-danger"> * </span></h5>
                        <textarea name="description" required>{{old('description',$whyus!=null ? $whyus->description : '')}}</textarea>
                        
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
    
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
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




