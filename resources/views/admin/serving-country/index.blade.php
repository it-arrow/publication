@extends('admin.includes.main')
@section('title')All Countries -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Countries</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Countries</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('countries.create')}}" class="btn btn-success">Add Country</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Image</th>
                    <th>Country Name </th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($countries)>0)
                                
                @foreach ($countries as $country)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td>
                        @if(empty($country->image)) 
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                        @else
                            @if (file_exists('uploads/country/'.$country->image))
                            <img src="{{asset('uploads/country/'.$country->image)}}" alt="{{$country->name}}" width="80px" height="80px" class="img-fluid">
                            @else
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid">
                            @endif
                            
                        @endif
                    </td>
                    <td> {{$country->name}} </td>
                    <form action="{{route('countries.destroy',$country->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            
                            <a class="btn btn-info btn-sm" href="{{route('countries.edit',$country->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" type="submit">
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
        
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->

@endsection
