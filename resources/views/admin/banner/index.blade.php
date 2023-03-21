@extends('admin.includes.main')
@section('title')Process -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Process</li>
                    </ol>
                </div>
                <h4 class="page-title">Process</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card p-3">
        @if ($banner!=null)
        <form action="{{route('banners.update',$banner->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
        @else
        <form action="{{route('banners.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            
        @endif
        
        @include('admin.includes.message')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="title">Title</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="parallax_text" value="{{old('parallax_text',$banner!=null ? $banner->parallax_text : '')}}" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="no.">Sub Title</label>
                        <input type="text" name="sub_title" class="form-control" value="{{old('sub_title',$banner!=null ? $banner->sub_title : '')}}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="image">Desktop Image</label><span class="text-danger">*</span><br>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="m_image">Mobile Image</label><span class="text-danger">*</span><br>
                        <input type="file" name="m_image" id="m_image" class="form-control">
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6 mb-3">
                    @if ($banner!=null)
                    <img id="preview-image-before-upload"  style="max-height:150px;" src="{{asset('uploads/banners/'.$banner->image)}}">
                    @else
                    <img id="preview-image-before-upload"  style="max-height:150px;">
                    @endif
                    
                </div>
                <div class="col-md-6 mb-3">
                    @if ($banner!=null)
                    <img id="preview-m-image-before-upload"  style="max-height:150px;" src="{{asset('uploads/banners/'.$banner->m_image)}}">
                    @else
                    <img id="preview-m-image-before-upload"  style="max-height:150px;">
                    @endif
                    
                </div>
            </div> 
            
            @if ($banner!=null)
            <button type="submit" class="btn btn-success btn-sm float-right">Update</button>
            @else
            <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
            @endif
        
        </form>
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
        $('#m_image').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-m-image-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
    });
    
</script>