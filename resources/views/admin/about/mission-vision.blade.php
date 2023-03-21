@extends('admin.includes.main')
@section('title')Mission & Vision -  {{ config('app.name', 'Laravel') }} @endsection
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
                        <li class="breadcrumb-item active">Mission & Vision</li>
                    </ol>
                </div>
                <h4 class="page-title">Mission & Vision</h4>
            </div>
        </div>
    </div>
     @component('components.breadcrumb-form')
        @slot('section')
        mission-vision
        @endslot
    @endcomponent
    @if ($mission_vision!=null)
    <form action="{{route('mission.vision.update',$mission_vision->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    @endif
        <div class="row">
            @include('admin.includes.message')
            <div class="col-lg-6 col-xxl-6">
                <div class="card h-600">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Mission:</h5>
                        <textarea name="mission_description" required>{{old('mission_description',$mission_vision!=null ? $mission_vision->mission_description : '')}}</textarea>
                        
                    </div>
                </div>
                <!-- end card-->

            </div>

            <div class="col-lg-6 col-xxl-6">
                <div class="card h-600">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Vision:</h5>
                        <textarea name="vision_description" required>{{old('vision_description',$mission_vision!=null ? $mission_vision->vision_description : '')}}</textarea>
                        
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
    CKEDITOR.replace('mission_description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });   
    CKEDITOR.replace('vision_description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });   
    
    
</script> 
@endsection





