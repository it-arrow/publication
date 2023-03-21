@extends('admin.includes.main')
@section('title')City -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">City</li>
                        </ol>
                    </div>
                    <h4 class="page-title">City</h4>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('city.create')}}" class="btn btn-success">Add City</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Name </th>
                    <th>District</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($cities)>0)
                    @foreach ($cities as $city)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        
                        <td> {{$city->name}} </td>
                        <td>{{$city->district->name}}</td>
                        
                        <form action="{{route('city.destroy',$city->id)}}" method="post" id="submit_form">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                
                                <a class="btn btn-info btn-sm" href="{{route('city.edit',$city->id)}}">
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

    