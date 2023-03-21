@extends('admin.includes.main')
@section('title')Enquiry -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Enquiry</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Enquiry</h4>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Name </th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <!--<th>Convinient Time From</th>-->
                    <!--<th>Convinient Time To</th>-->
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($messages)>0)
                    @foreach ($messages as $message)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        
                        <td> {{$message->name}} </td>
                        <td>{{$message->phone}}</td>
                        <td>{{$message->address}}</td>
                        <!--<td>{{date('h:i A',strtotime($message->time_from))}}</td>-->
                        <!--<td>{{date('h:i A',strtotime($message->time_to))}}</td>-->
                        <form action="{{route('callback.destroy',$message->id)}}" method="post" id="submit_form">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                <a href="{{ route('callback.show',$message->id) }}" target="_blank" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-danger btn-sm " type="submit" data-toggle="tooltip" title='Delete'>
                                    <i class="fas fa-trash">
                                    </i>
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
