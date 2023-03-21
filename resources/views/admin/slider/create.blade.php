@extends('admin.includes.main')

@section('title')Add slider -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Add Slider</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Slider</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('sliders.index')}}" class="btn btn-success ">View Sliders</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        @if (count(App\Models\Slider::all())<0)
                        <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{old('title')}}" id="title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="image">Image</label><br>
                                        <input type="file" name="image" id="image" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="text">Text</label>
                                        <textarea class="form-control" id="text" name="text" rows="3">{{old('text')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img id="preview-image-before-upload"  style="max-height:150px;">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">Status</label><br>
                                    <input type="radio" name="status" value="1" @if(old('status') == '1') checked @endif> Show
                                    <input type="radio" name="status" value="0" @if(old('status') == '0') checked @endif> Hide
                                </div>
                            </div> 
                            <div class="text-xl-end">
                                <button type="submit" class="btn btn-success">Save</button> 
                            </div>
                        </form>
                        @else
                            Slider Limit is only 3
                        @endif
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