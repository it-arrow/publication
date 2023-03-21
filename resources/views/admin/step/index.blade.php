@extends('admin.includes.main')
@section('title')Hiring Process -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Hiring Process</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Hiring Process</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('steps.create')}}" class="btn btn-success">Add Process</a>
            </div>
        </div>
        <table class="table table-striped projects" id="myTable">
            <thead>
                <tr>
                    <th> # </th>
                    {{-- <th width="10%">Icon</th> --}}
                    <th > Title </th>
                    {{-- <th width="40%">Description</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($steps)>0)
                    
                    @foreach ($steps as $step)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        {{-- <td>
                            @if (!empty($step->icon))
                                @if(file_exists('uploads/steps/'.$step->icon))
                                    <img class="svg-color img-fluid W-100" src="{{asset('uploads/steps/'.$step->icon)}}" alt="category-image"> 
                                @else
                                    <img class="svg-color img-fluid W-100" src="{{asset('placeholder.jpg')}}" alt="category-image"> 
                                @endif
                            @else
                                <img class="svg-color img-fluid W-100" src="{{asset('placeholder.jpg')}}" alt="category-image"> 
                            @endif
                        </td> --}}
                        <td> {{$step->title}} </td>
                        {{-- <td>
                            <p>{{$step->text}}</p>
                            
                        </td> --}}
                        <form action="{{route('steps.destroy',$step->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                <a class="btn btn-info btn-sm" href="{{route('steps.edit',$step->id)}}">
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
    </div>
</div>
@endsection
@section('scripts')


<script>
    $(document).ready(function(){
        //datatable
        $('#myTable').DataTable();
        
    });

</script>




@endsection
