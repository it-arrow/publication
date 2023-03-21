@extends('admin.includes.main')
@section('title')Trust & Security -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Trust & Security</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Trust & Security</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('trust&security.create')}}" class="btn btn-success">Add Trust & Security</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Icon</th>
                    <th>Title</th>
                    {{-- <th>Description</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($trusts)>0)
                                
                @foreach ($trusts as $trust)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td>
                        @if(empty($trust->icon)) 
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="50px" height="50px" class="img-fluid"> 
                        @else
                            @if (file_exists('uploads/trusts/'.$trust->icon))
                            <img src="{{asset('uploads/trusts/'.$trust->icon)}}" alt="{{$trust->title}}" width="50px" height="50px" class="img-fluid">
                            @else
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="50px" height="50px" class="img-fluid">
                            @endif
                            
                        @endif
                    </td>
                    <td> {{$trust->title}} </td>
                   {{-- <td>{{$trust->description}}</td> --}}
                    <form action="{{route('trustsecurity.delete',$trust->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            
                            <a class="btn btn-info btn-sm" href="{{route('trustsecurity.edit',$trust->id)}}">
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
