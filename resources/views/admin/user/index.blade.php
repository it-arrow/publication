@extends('admin.includes.main')
@section('title')Teachers -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Teachers</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Teachers</h4>
                </div>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('users.create')}}" class="btn btn-success">Add Teacher</a>
            </div>
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Role </th>
                    <th>Action</th>
                </tr>
            </thead>


            <tbody>
                @if(count($users)>0)

                @foreach ($users as $user)
                <tr>
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach ($user->roles as $role)

                        <span class="badge badge-success">{{$role->name}}</span>
                        @endforeach
                    </td>
                    <form action="{{route('users.destroy',$user->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            @can('role-edit')
                            <a class="btn btn-info btn-sm" href="{{route('users.edit',$user->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            @endcan
                            @can('role-delete')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>
                            @endcan
                        </td>
                    </form>
                </tr>

                @endforeach

                @endif
            </tbody>
        </table>

        <!-- end row-->

    </div> <!-- container -->
</div>

@endsection
