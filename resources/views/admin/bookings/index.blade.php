@extends('admin.includes.main')
@section('title')All Bookings -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Bookings</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Bookings</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('blogs.create')}}" class="btn btn-success">Add Blog</a>
            </div>
            @include('admin.includes.message')
        </div>
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>User</th>
                    <th>Service </th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Booking Date</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($bookings)>0)
                                
                @foreach ($bookings as $booking)
                {{-- {{dd($booking->service_id)}} --}}
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td>
                        {{$booking->user->name}}
                    </td>
                    <td> {{$booking->service_name->name}} </td>
                    <td>
                        {{$booking->address}}
                    </td>
                    <td>{{$booking->user->phone}}</td>
                    <td>{{$booking->created_at->format('d F Y')}}</td>
                    <form action="{{route('bookings.destroy',$booking->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            
                            <a class="btn btn-info btn-sm" href="{{route('bookings.edit',$booking->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                
                            </a>
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="fas fa-trash">
                                </i>
                            </button>
                        </td>
                    </form>

                </tr>
                
                @endforeach
            @else
                <tr><td colspan="6"><i class="fa fa-exclamation-triangle"></i> {!! trans('No Data Found') !!}</td></tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

