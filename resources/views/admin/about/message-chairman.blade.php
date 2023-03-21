@extends('admin.includes.main')
@section('title')Message From Chairman -  {{ config('app.name', 'Laravel') }} @endsection
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
                        <li class="breadcrumb-item active">Message From Chairman</li>
                    </ol>
                </div>
                <h4 class="page-title">Message From Chairman</h4>
            </div>
        </div>
    </div>
     @component('components.breadcrumb-form')
        @slot('section')
        chairman-message
        @endslot
    @endcomponent
    @if ($message!=null)
    <form action="{{route('message.chairman.update',$message->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    @endif
        <div class="row">
            @include('admin.includes.message')
            <div class="col-xxl-5 col-lg-5">
                <!-- project card -->
                <div class="card d-block h-600">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Image:</label><span class="text-danger"> * </span><br>
                                    <input type="file" name="message_image" id="image" class="form-control">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                @if ($message->message_image!=null)
                                <img id="preview-image-before-upload"  style="max-height:150px;" src="{{asset('uploads/about/message/'.$message->message_image)}}">
                                @else
                                <img id="preview-image-before-upload"  style="max-height:150px;">
                                @endif
                                
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label for="message_text">Block Quote:</label><br>
                                <textarea name="message_text" id="message_text" rows="5" style="width:100%">{{ old('message_text',$message!=null ? $message->message_text : '') }}</textarea>
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
                        <textarea name="message_content" required>{{old('message_content',$message!=null ? $message->message_content : '')}}</textarea>
                        
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

@endsection
@section('scripts')
<script type="text/javascript">
    CKEDITOR.replace('message_content', {
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





