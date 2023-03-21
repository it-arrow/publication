@extends('admin.includes.main')
@section('title')Demand Documents -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Demand Documents</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Demand Documents</h4>
                </div>
            </div>
        </div>
        @component('components.breadcrumb-form')
        @slot('section')
        demand-document
        @endslot
        @endcomponent
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('demand-document.create')}}" class="btn btn-success">Add Document</a>
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
                @if(count($documents)>0)
                                
                @foreach ($documents as $document)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    {{-- <td>
                        @if(empty($document->image)) 
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                        @else
                            @if (file_exists('uploads/documents/demand/'.$document->image))
                            <img src="{{asset('uploads/documents/demand/'.$document->image)}}" alt="{{$document->title}}" width="80px" height="80px" class="img-fluid">
                            @else
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid">
                            @endif
                            
                        @endif
                    </td> --}}
                    <td> {{$document->title}} </td>
                    <form action="{{route('demand-document.destroy',$document->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            
                            <a class="btn btn-info btn-sm" href="{{route('demand-document.edit',$document->id)}}">
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
