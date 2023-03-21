@extends('admin.includes.main')
@section('title')Edit Trust & Security -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Edit Trust & Security</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Trust & Security</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('trust&security.index')}}" class="btn btn-success ">View Trust & Security</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('trustsecurity.update',$trust->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{old('title',$trust->title)}}" id="title" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="image">Icon</label><br>
                                        <input type="file" name="icon" id="image" class="form-control" >
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="5">{{old('description',$trust->description)}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img id="preview-image-before-upload"  style="max-height:150px;" src="{{asset('uploads/trusts/'.$trust->icon)}}">
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


