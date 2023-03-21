@extends('admin.includes.main')
@section('title')Schools -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Schools</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Schools</h4>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('schools.create')}}" class="btn btn-success">Add School</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Name </th>
                    <th>Address</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Principal Name</th>
                    <th>Action</th>
                </tr>
            </thead>


            <tbody>
                @if(count($schools)>0)
                    @foreach ($schools as $school)
                    <tr>
                        <td> {{$loop->iteration}} </td>

                        <td> {{$school->name}} </td>
                        <td> {{$school->address}} </td>
                        <td> {{$school->number}} </td>
                        <td> {{$school->email}} </td>
                        <td> {{$school->principal_name}} </td>

                        <form action="{{route('schools.destroy',$school->id)}}" method="post" id="submit_form">
                            @csrf
                            @method('delete')
                            <td class="project-actions">

                                <a class="btn btn-info btn-sm" href="{{route('schools.edit',$school->id)}}">
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

