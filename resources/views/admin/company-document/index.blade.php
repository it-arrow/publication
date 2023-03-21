@extends('admin.includes.main')
@section('title')Company Documents -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Company Documents</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Company Documents</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @component('components.breadcrumb-form')
        @slot('section')
        company-document
        @endslot
        @endcomponent
        
        <div class="row mb-2">
            <div class="col-sm-4">
                <a href="{{route('company-document.create')}}" class="btn btn-success rounded-pill mb-3"><i class="mdi mdi-plus"></i> Add Document</a>
            </div>
            
        </div> 
        <!-- end row-->
        @if ($documents!=null)
        <div class="row">
            @foreach ($documents as $document)
            
            <div class="col-md-3 ">
                <!-- project card -->
                <div class="card d-block">
                    <!-- project-thumbnail -->
                    <img class="card-img-top h-200" src="{{asset('uploads/documents/'.$document->image)}}">
                    

                   
                    <div class="card-body position-relative">
                        <div class="dropdown card-widgets">
                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-fill"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="{{route('company-document.edit',$document->id)}}" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                <!-- item-->
                                <form action="{{route('company-document.destroy',$document->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                <button type="submit" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</button>
                                </form>
                                
                            </div>
                        </div>
                        <h4 class="mt-0">
                            <a href="javascript:0" class="text-title">{{$document->name}}</a>
                        </h4>
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
