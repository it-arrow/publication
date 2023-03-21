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
                            <a href="{{route('company-document.index')}}" class="btn btn-success ">View Documents</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('company-document.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="document_name">Document name</label><span class="text-danger"> * </span><br>
                                        <input type="text" name="name" id="document_name" class="form-control" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="image">Image</label><span class="text-danger"> * </span><br>
                                        <input type="file" name="image" id="image" class="form-control" required>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6">
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


