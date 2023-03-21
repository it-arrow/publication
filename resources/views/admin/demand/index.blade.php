@extends('admin.includes.main')
@section('title')Demands -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Demands</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Demands</h4>
                </div>
            </div>
        </div>
        @component('components.breadcrumb-form')
        @slot('section')
        current-demand
        @endslot
        @endcomponent
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('demand.create')}}" class="btn btn-success">Add Demand</a>
            </div>
        </div>

        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Image</th>
                    <th>Position</th>
                    <th>Total Demands</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($demands)>0)
                                
                    @foreach ($demands as $demand)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td>
                            @if(empty($demand->image)) 
                                <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                            @else
                                @if (file_exists('uploads/demands/'.$demand->image))
                                <img src="{{asset('uploads/demands/'.$demand->image)}}" alt="{{$demand->name}}" width="80px" height="80px" class="img-fluid">
                                @else
                                <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid">
                                @endif
                                
                            @endif
                        </td>
                        
                        <td>
                            {{ $demand->position }}
                        </td>
                        <td>{{$demand->total_demands}}</td>
                        <td> {{$demand->expiry}} </td>

                        
                        <form action="{{route('demand.destroy',$demand->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                <a class="btn btn-info btn-sm" href="{{route('demand.edit',$demand->id)}}">
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

