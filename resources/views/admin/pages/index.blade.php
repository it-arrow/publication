@extends('admin.includes.main')
@section('title')Pages -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Pages</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pages</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('pages.create')}}" class="btn btn-success">Add Page</a>
            </div>
            @include('admin.includes.message')
        </div>
        <table class="table dt-responsive nowrap w-100" id="basic-datatable">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Title</th>
                    <th> Slug </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($pages)>0)
                    @foreach ($pages as $page)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        
                        <td> {{$page->title}} </td>
                        
                        <td>{{$page->slug}}</td>

                        <form action="{{route('pages.destroy',$page->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
                                
                                <a class="btn btn-info btn-sm" href="{{route('pages.edit',$page->slug)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                @if ($page->slug != 'documents-required')
                                <button class="btn btn-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" title='Delete'>
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                                @endif
                                
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
