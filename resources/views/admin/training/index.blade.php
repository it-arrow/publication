@extends('admin.includes.main')
@section('title')Trainings -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Trainings</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Trainings</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        
        <div class="row mb-2">
            <div class="col-sm-4">
                <a href="{{route('training.create')}}" class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i> Add Training</a>
            </div>
            
        </div> 
        <!-- end row-->
        @if ($trainings!=null)
        <div class="row">
            @foreach ($trainings as $training)
            
            <div class="col-md-3 ">
                <!-- project card -->
                <div class="card d-block">
                    <!-- project-thumbnail -->
                    <img class="card-img-top h-200" src="{{asset('uploads/trainings/'.$training->image)}}">
                    

                    <div class="card-body position-relative">
                        <div class="dropdown card-widgets">
                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-fill"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="{{route('training.edit',$training->id)}}" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                <!-- item-->
                                <form action="{{route('training.destroy',$training->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                <button type="submit" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</button>
                                </form>
                                
                            </div>
                        </div>
                        <h4 class="mt-0">
                            <a href="javascript:0" class="text-title">{{$training->title}}</a>
                        </h4>


                        <!-- project detail-->
                        <p class="mb-1">
                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                <b>{{$training->training_date}}</b> 
                            </span>
                            
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
            @endforeach
        </div>
        <!-- end row-->
        @endif

       
        
    </div> <!-- container -->

</div> <!-- content -->

@endsection
