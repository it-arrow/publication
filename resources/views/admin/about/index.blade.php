@extends('admin.includes.main')
@section('title')Company Overview -  {{ config('app.name', 'Laravel') }} @endsection
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
                        <li class="breadcrumb-item active">Company Overview</li>
                    </ol>
                </div>
                <h4 class="page-title">Company Overview</h4>
            </div>
        </div>
    </div>
    @component('components.breadcrumb-form')
        @slot('section')
        about
        @endslot
        @endcomponent
    @if ($about!=null)
    <form action="{{route('about.update',$about->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    @else
    <form action="{{route('about.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
    @endif
        <div class="row">
            @include('admin.includes.message')
            <div class="col-xxl-7 col-lg-7">
                <!-- project card -->
                <div class="card d-block ">
                    <div class="card-body">
                        <div class="row ">
                            <div class="mb-3">
                                <label for="title">Title</label><span class="text-danger"> * </span>
                                <input type="text" class="form-control" name="title" value="{{old('title',$about!=null ? $about->title : '')}}" required>
                            </div>
                            
                        </div>
                        <div class="row ">
                            <div class="mb-3">
                                <label for="registration">Certification & Registration Company Registration No.</label>
                                <input type="text" class="form-control" name="registration" value="{{old('registration',$about!=null ? $about->registration : '')}}" required>
                            </div>
                            
                        </div>
                        <div class="row ">
                            <div class="mb-3">
                                <label for="labour_department">Ministry of Labour Department of Foreign Employment License No.</label>
                                <input type="text" class="form-control" name="labour_department" value="{{old('labour_department',$about!=null ? $about->labour_department : '')}}" required>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label >Description:<span class="text-danger"> * </span>
                                <textarea name="description" required>{{old('description',$about!=null ? $about->about_content : '')}}</textarea>
                            </div>
                            </div>
                        </div> 
                         
                        

                    </div> <!-- end card-body-->
                    
                </div> <!-- end card-->

                
                <!-- end card-->
            </div> <!-- end col -->

            <div class="col-lg-5 col-xxl-5">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="chairman">Chairman Name</label><span class="text-danger"> * </span>
                                <input type="text" class="form-control" name="chairman" value="{{old('chairman',$about!=null ? $about->chairman : '')}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="member">Member</label>
                                <input type="text" class="form-control" name="member" value="{{old('member',$about!=null ? $about->member : '')}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="capital">Capital Structure</label>
                                <textarea name="capital" class="form-control" rows="3">{{old('capital',$about!=null ? $about->capital : '')}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="image">Image:</label><span class="text-danger"> * </span><br>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                @if ($about!=null)
                                <img id="preview-image-before-upload"  style="max-height:150px;" src="{{asset('uploads/about/'.$about->about_image)}}">
                                @else
                                <img id="preview-image-before-upload"  style="max-height:150px;">
                                @endif
                            </div>
                        </div>
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
    CKEDITOR.replace('description', {
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
    // $('#message_image').change(function(){
                
    //     let reader = new FileReader();
    
    //     reader.onload = (e) => { 
    
    //     $('#preview-message-image-before-upload').attr('src', e.target.result); 
    //     }
    
    //     reader.readAsDataURL(this.files[0]); 
    
    // });
            
    });
    
</script> 
@endsection





