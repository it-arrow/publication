@extends('admin.includes.main')
@section('title')Awards -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Awards</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Awards</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @component('components.breadcrumb-form')
        @slot('section')
        award
        @endslot
        @endcomponent
        
        <div class="row mb-2">
            <div class="col-sm-4">
                <a href="{{route('awards.create')}}" class="btn btn-success rounded-pill mb-3"><i class="mdi mdi-plus"></i> Add Award</a>
            </div>
            
        </div> 
        <!-- end row-->
        @if ($awards!=null)
        <div class="row">
            @foreach ($awards as $award)
            
            <div class="col-md-4 ">
                <!-- project card -->
                <div class="card d-block">
                    <!-- project-thumbnail -->
                    <img class="card-img-top h-200" src="{{asset('uploads/award/'.$award->image)}}">
                    

                    <div class="card-body position-relative">
                        <div class="d-flex justify-content-between">
                            <a href="{{route('awards.edit',$award->id)}}" class="btn btn-primary"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                        
                            <form action="{{route('awards.destroy',$award->id)}}" method="post">
                                @csrf
                                @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete me-1"></i>Delete</button>
                            </form>
                        </div>
                        
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
