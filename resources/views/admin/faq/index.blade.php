@extends('admin.includes.main')
@section('title')Faq -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Faq</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Faq</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            @if (count($faq)<3)
                
            <div class="text-xl-end">
                <a href="{{route('faq.create')}}" class="btn btn-success">Add Faq</a>
            </div>
            @endif
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    {{-- <th>Image</th> --}}
                    <th>Question </th>
                    <th>Answer</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($faq)>0)
                                
                @foreach ($faq as $fq)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    
                    <td> {{$fq->question}} </td>
                    <td>{{ $fq->answer }}</td>
                    <form action="{{route('faq.destroy',$fq->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            
                            <a class="btn btn-info btn-sm" href="{{route('faq.edit',$fq->id)}}">
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
