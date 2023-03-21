@extends('admin.includes.main')
@section('title')Our Strengths -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Our Strengths</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Our Strengths</h4>
                </div>
            </div>
        </div>
         @component('components.breadcrumb-form')
            @slot('section')
            strength
            @endslot
        @endcomponent
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('strength.create')}}" class="btn btn-success">Add Strength</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Title </th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($strengths)>0)
                                
                @foreach ($strengths as $strength)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    
                    <td> {{$strength->title}} </td>
                    <form action="{{route('strength.destroy',$strength->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            
                            <a class="btn btn-info btn-sm" href="{{route('strength.edit',$strength->id)}}">
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
