@extends('admin.includes.main')
@section('title')Add Testimonial -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Add Testimonial</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Testimonial</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="text-xl-end">
                    <a href="{{route('testimonials.index')}}" class="btn btn-success ">View Testimonials</a>
                </div>
            </div>
            <div class="card-body">
                @include('admin.includes.message')

                <form action="{{route('testimonials.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label> <span class="text-danger"> * </span>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Designation</label><span class="text-danger"> * </span>
                                <input type="text" class="form-control" name="designation" value="{{old('designation')}}" required>
                            </div>
                        </div>  
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image">Image</label><br>
                                <input type="file" name="image" id="image" class="form-control mb-2">
                                <img id="preview-image-before-upload"  style="max-height:150px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Message (max:255 characters)</label><span class="text-danger"> * </span>
                                <textarea class="form-control" name="message" rows="5" required>{{old('message')}}</textarea>
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
  
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
            
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

