@extends('admin.includes.main')
@section('title')Policies -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Policies</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Policies</h4>
                </div>
            </div>
        </div>
        @component('components.breadcrumb-form')
        @slot('section')
        policy
        @endslot
        @endcomponent
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('policy.create')}}" class="btn btn-success">Add Policy</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    {{-- <th>Image</th> --}}
                    <th>Title </th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($policies)>0)
                                
                @foreach ($policies as $policy)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    {{-- <td>
                        @if(empty($policy->image)) 
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                        @else
                            @if (file_exists('uploads/policy/'.$policy->image))
                            <img src="{{asset('uploads/policy/'.$policy->image)}}" alt="{{$policy->policy_name}}" width="80px" height="80px" class="img-fluid">
                            @else
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid">
                            @endif
                            
                        @endif
                    </td> --}}
                    <td> {{$policy->policy_name}} </td>
                    <form action="{{route('policy.destroy',$policy->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            
                            <a class="btn btn-info btn-sm" href="{{route('policy.edit',$policy->id)}}">
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
