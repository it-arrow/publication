@extends('admin.includes.main')
@section('title')Services -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<style>
    .dataTables_wrapper {
        overflow-x: scroll !important;
    }
</style>
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
                            <li class="breadcrumb-item active">Services</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Services</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('services.create')}}" class="btn btn-success">Add Service</a>
            </div>
            @include('admin.includes.message')
        </div>
        <table id="basic-datatable" class="table nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Image</th>
                    {{-- <th>Icon</th> --}}
                    <th> Name </th>
                    {{-- <th>Featured</th> --}}
                    <th>Category</th>
                    {{-- <th>Subcatgeory</th> --}}
                    <th>Tags</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($services)>0)
                    @foreach ($services as $key => $service)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td>
                            @if(!empty($service->image)) 
                            
                                @if (file_exists('uploads/services/image/'.$service->image)) 
                                  
                                    <img src="{{asset('uploads/services/image/'.$service->image)}}" alt="{{$service->name}}" width="80px" height="80px" class="img-fluid">
                                @else
                                    <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                                @endif
                            @else
                                <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                            @endif
                        </td>
                        {{-- <td>
                            @if(!empty($service->icon)) 
                                @if (file_exists('uploads/services/icon/'.$service->icon))    
                                    <img src="{{asset('uploads/services/icon/'.$service->icon)}}" alt="{{$service->name}}" width="80px" height="80px" class="img-fluid">
                                @else
                                    <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                                @endif
                            @else
                                <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                            @endif
                        </td> --}}
                        <td> {{$service->name}} </td>
                        {{-- <td>
                            <input type="checkbox" data-id="{{ $service->id }}" name="featured" class="js-switch" {{ $service->featured == 1 ? 'checked' : '' }}>
                        </td> --}}
                        <td>{{$service->category->name}}</td>
                        {{-- <td>{{$service->subcategory->name}}</td> --}}
                        <td>{{$service->tags}}</td>
                        <form action="{{route('services.destroy',$service->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                
                                <a class="btn btn-info btn-sm" href="{{route('services.edit',$service->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    {{-- Edit --}}
                                </a>
                                <button class="btn btn-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" title='Delete'>
                                    <i class="fas fa-trash">
                                    </i>
                                    {{-- Delete --}}
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

{{-- @section('scripts')
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });
    $(document).ready(function(){
        //datatable
        
        //category status
        $('.js-switch').change(function () {
            let featured_status = $(this).prop('checked') === true ? 1 : 0;
            // console.log(status);
            let service_id = $(this).data('id');
            //   console.log(category_id);
    
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('service.featured_status') }}',
                data: {'status': featured_status, 'id': service_id},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 20;
                    toastr.success(data.message);
                }
            });
        });
    });
</script>
@endsection --}}