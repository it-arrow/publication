@extends('admin.includes.main')
@section('title')Edit Sub Category -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Edit Sub Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Sub Category</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('subcategory.index')}}" class="btn btn-success ">View Category</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('subcategory.update',$sub_cat->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label> <span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="name" value="{{old('name',$sub_cat->name)}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="category">Parent Category</label> <span class="text-danger"> * </span>
                                        <select name="category_id" class="form-control select2" data-toggle="select2" required>
                                            @if ($categories!=null)
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" @if($category->id==$sub_cat->category_id) selected @endif>{{$category->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="icon">Icon</label> <span class="text-danger"> * </span>
                                            <input type="file" class="form-control mb-2" name="icon" id="icon">
                                            <img id="preview-icon-before-upload"  @if($sub_cat->icon!=null) src="{{asset('uploads/services/subcategory/'.$sub_cat->icon)}}" @endif style="max-height:150px;">
                                    </div>
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
    

    $('#icon').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-icon-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
            
    });
    });
    
</script>


@endsection