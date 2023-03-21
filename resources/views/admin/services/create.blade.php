@extends('admin.includes.main')
@section('title')Add Service -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Add Services</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Services</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('services.index')}}" class="btn btn-success ">View Services</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('services.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label> <span class="text-danger"> * </span>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="featured_service">Featured Service</label><br>
                                        <input type="checkbox" name="featured" class="js-switch">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="category">Category</label> <span class="text-danger"> * </span>
                                        <select name="category_id" class="form-control select2" data-toggle="select2" required id="category_id">
                                            <option selected disabled>Select Category</option>
                                            @if ($categories!=null)
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tags">Tags</label>
                                        <input type="text" class="form-control" name="tags[]" data-role="tagsinput" >
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="subcategory">Sub Category</label> <span class="text-danger"> * </span>
                                        <select name="subcategory_id" class="form-control select2" data-toggle="select2" id="subcategory_id" required>
                                            <option selected disabled>Select Sub Category</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Image</label><br>
                                        <input type="file" name="image" id="image" class="form-control" required>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Icon</label><br>
                                        <input type="file" name="icon" id="icon" class="form-control">
                                    </div>
                                </div> --}}
                            </div> 
                            <div class="row">
                                <div class="col-lg-6">
                                    <img id="preview-image-before-upload"  style="max-height:150px;">
                                </div>
                                <div class="col-lg-6">
                                    <img id="preview-icon-before-upload"  style="max-height:150px;">
                                </div>
                            </div> 
                            {{--<div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Descriptions</label>
                                        <textarea class="form-control" name="description" required>{{old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>--}}
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
   
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('tag');//, {
       // filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        //filebrowserUploadMethod: 'form'
    //});
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });

    
    $(document).ready(function (e) {
    

        $('#icon').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-icon-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
                
        });
        $('#image').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-image-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
                
        });
        // $('#category_id').on('change', function() {
        //     get_subcategories_by_category();
        // });
    });
    
</script>


@endsection

