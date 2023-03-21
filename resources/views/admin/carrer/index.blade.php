@extends('admin.includes.main')
@section('title')Careers -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Careers</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Careers</h4>
                </div>
            </div>
        </div>
        
        
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    {{-- <th>Subject</th> --}}
                    {{-- <th>Position</th> --}}
                    {{-- <th>File</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($carrers)>0)
                                
                    @foreach ($carrers as $carrer)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td>
                            {{ $carrer->name }}
                        </td>
                        <td>{{$carrer->phone}}</td>
                        <td> {{$carrer->email}} </td>
                        {{-- <td> {{$carrer->subject}} </td> --}}
                        {{-- <td>@if($carrer->position_id!=null){{App\Models\CurrentDemand::find($carrer->position_id)->position}}@endif</td> --}}

                        {{-- <td><a href="{{ asset('uploads/carrer/'.$carrer->document) }}">{{ $carrer->document }}</a></td> --}}
                        <form action="{{route('career.destroy',$carrer->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                <a href="{{ route('career.show',$carrer->id) }}" target="_blank" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-danger btn-sm" type="submit">
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
        
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->

@endsection

