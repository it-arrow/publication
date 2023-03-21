@extends('admin.includes.main')
@section('title')Sub Categories -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Sub Categories</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Sub Categories</h4>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('subcategory.create')}}" class="btn btn-success">Add Sub Category</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Icon</th>
                    <th>Name </th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($subcategories)>0)
                    @foreach ($subcategories as $sub_cat)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td>
                            @if(!empty($sub_cat->icon)) 
                                @if (file_exists('uploads/services/subcategory/'.$sub_cat->icon))    
                                    <img src="{{asset('uploads/services/subcategory/'.$sub_cat->icon)}}" alt="{{$sub_cat->name}}" width="80px" height="80px" class="img-fluid">
                                @else
                                    <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                                @endif
                            @else
                                <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                            @endif
                        </td>                 
                        <td> {{$sub_cat->name}} </td>
                        <td>{{$sub_cat->serviceCategory->name}}</td>
                        <form action="{{route('subcategory.destroy',$sub_cat->id)}}" method="post" id="submit_form">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                
                                <a class="btn btn-info btn-sm" href="{{route('subcategory.edit',$sub_cat->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <button class="btn btn-danger btn-sm " type="submit" data-toggle="tooltip" title='Delete'>
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                            </td>
                        </form>

                    </tr>
                    
                    @endforeach
                
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection

    