@extends('admin.includes.main')

@section('title')Client -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Client</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Client</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('client.section.update',$section->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <input type="hidden" value="client_section" name="section">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="title">Title</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="title" value="{{old('title',json_decode($section->value)->title)}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="text">Text</label>
                                        <input type="text" class="form-control" name="text" value="{{old('text',json_decode($section->value)->text)}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="image">Background Image</label><br>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-lg-6">
                                    @if (json_decode($section->value)->image!=null)
                                        <img id="preview-image-before-upload" src="{{ asset('uploads/clients/bg/'.json_decode($section->value)->image) }}"  style="max-height:150px;">
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


