@extends('admin.includes.main')
@section('title')Hiring Process -  {{ config('app.name', 'Laravel') }} @endsection
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
                        <li class="breadcrumb-item active">Hiring Process</li>
                    </ol>
                </div>
                <h4 class="page-title">Hiring Process</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                
                <div class="card-body">
                    @include('admin.includes.message')
                    <form action="{{route('update.process_image',$image->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="image">Hiring Process Image</label><br>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6">
                                @if ($image->value!=null)
                                    <img id="preview-image-before-upload" src="{{ asset('uploads/step/'.$image->value) }}"  style="max-height:150px;">
                                @else
                                    <img id="preview-image-before-upload"  style="max-height:150px;">
                                @endif
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

@endsection
@section('scripts')
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
@endsection





