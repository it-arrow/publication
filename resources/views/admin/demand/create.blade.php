@extends('admin.includes.main')
@section('title')Demands -  {{ config('app.name', 'Laravel') }} @endsection
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
                        <li class="breadcrumb-item active">Demands</li>
                    </ol>
                </div>
                <h4 class="page-title">Demands</h4>
            </div>
        </div>
    </div>
   
    <form action="{{route('demand.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('admin.includes.message')
            <div class="col-xxl-5 col-lg-5">
                <!-- project card -->
                <div class="card d-block ">
                    <div class="card-body">
                        <div class="row ">
                            <div class="mb-3">
                                <label for="position">Position</label><span class="text-danger"> * </span>
                                <input type="text" class="form-control" name="position" value="{{old('position')}}" required>
                            </div>
                            
                        </div>
                        <div class="row ">
                            <div class="mb-3">
                                <label for="total_demands">Total Demands</label>
                                <input type="number" class="form-control" name="total_demands" value="{{old('total_demands')}}" required>
                            </div>
                            
                        </div>
                        <div class="row ">
                            <div class="mb-3">
                                <label for="expiry">Demand Expiry Date</label>
                                <input type="date" class="form-control" name="expiry" value="{{old('expiry')}}" >
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="mb-3">
                                <label for="image">Image:</label><br>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <img id="preview-image-before-upload"  style="max-height:150px;">
                            </div>
                        </div>
                         
                        

                    </div> <!-- end card-body-->
                    
                </div> <!-- end card-->

                
                <!-- end card-->
            </div> <!-- end col -->

            <div class="col-lg-7 col-xxl-7">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label >Description:<span class="text-danger"> * </span>
                                <textarea name="content" required>{{old('description')}}</textarea>
                            </div>
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





