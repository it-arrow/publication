@extends('admin.includes.main')
@section('title')All Manpowers -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<style>
    .dataTables_wrapper {
        overflow-x: scroll !important;
    }
</style>
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
                            <li class="breadcrumb-item active">Manpowers</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manpowers</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('manpowers.create')}}" class="btn btn-success">Add Manpower</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Name</th>
                    <th>Address </th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Skill</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($manpowers)>0)
                                
                @foreach ($manpowers as $manpower)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td><a href="{{route('manpowers.show',$manpower->id)}}" target="_blank">{{$manpower->name}}</a></td>
                    <td>{{$manpower->address}}, {{$manpower->city_detail->name}}</td>
                    <td>{{$manpower->categoryName->name}}</td>
                    <td>{{$manpower->subcategory!=null ? $manpower->sub_category->name : ''}}</td>
                    <td>{{$manpower->skill}}</td>
                    <td>{{$manpower->primary_phone}}</td>
                   
                    <form action="{{route('manpowers.destroy',$manpower->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            <a class="btn btn-success btn-sm" href="{{route('manpowers.show',$manpower->id)}}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('manpowers.edit',$manpower->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                            </a>
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="fas fa-trash">
                                </i>
                            </button>
                        </td>
                    </form>

                </tr>
                
                @endforeach
            
            @endif
            </tbody>
        </table>
        
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->

@endsection
