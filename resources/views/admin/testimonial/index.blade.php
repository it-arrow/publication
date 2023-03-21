@extends('admin.includes.main')
@section('title')Testimonials -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Testimonials</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Testimonials</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('testimonials.create')}}" class="btn btn-success">Add Testimonial</a>
            </div>
            @include('admin.includes.message')
        </div>
        <table class="table table-striped projects" id="basic-datatable">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Image</th>
                    <th> Name </th>
                    <th>Designation</th>
                    {{-- <th>Message</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($testimonials)>0)
                    @foreach ($testimonials as $testimonial)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td>
                            @if(empty($testimonial->image)) 
                                <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                            @else
                                <img src="{{asset('uploads/testimonials/'.$testimonial->image)}}" alt="{{$testimonial->name}}" width="80px" height="80px" class="img-fluid">
                            @endif
                        </td>
                        <td> {{$testimonial->name}} </td>
                        <td> {{$testimonial->designation}} </td>
                        {{-- <td> {{$testimonial->message}} </td> --}}
                        <form action="{{route('testimonials.destroy',$testimonial->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                
                                <a class="btn btn-info btn-sm" href="{{route('testimonials.edit',$testimonial->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                
                                <button class="btn btn-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" title='Delete'>
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

    