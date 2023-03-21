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
                <a href="{{route('subcategories.create')}}" class="btn btn-success">Add Sub Category</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
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
                        
                        <td> {{$sub_cat->name}} </td>
                        <td>{{$sub_cat->category->name}}</td>
                        <form action="{{route('subcategories.destroy',$sub_cat->id)}}" method="post" id="submit_form">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                
                                <a class="btn btn-info btn-sm" href="{{route('subcategories.edit',$sub_cat->id)}}">
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

    