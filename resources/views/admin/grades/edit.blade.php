@extends('admin.includes.main')
@section('title')Edit Grade -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Edit Grade</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Grade</h4>
                </div>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('grades.index')}}" class="btn btn-success">View Grades</a>
            </div>

        </div>
        <!-- end page title -->
        <div class="row">

            @include('admin.includes.message')
                <form action="{{route('grades.update',$grade->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 px-2">
                                <label for="grade">Grade</label><span class="text-danger"> * </span>
                                <input type="text" class="form-control" name="grade" value="{{old('grade',$grade->name)}}" required>
                            </div>

                        </div>

                    </div>
                    <div class="btn-group mb-2 ms-2">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </form>
        </div>
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->

@endsection
