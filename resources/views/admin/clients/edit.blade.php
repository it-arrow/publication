@extends('admin.includes.main')
@section('title')Edit Client -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Edit Client</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Client</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('client.index')}}" class="btn btn-success ">View Client</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('client.update',$client->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name',$client->name)}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Link</label>
                                        <input type="text" class="form-control" name="url" value="{{old('url',$client->url)}}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="image">Image</label><br>
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-lg-6">
                                    <img id="preview-image-before-upload"  style="max-height:150px;" src="{{asset('uploads/clients/'.$client->image)}}">
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


