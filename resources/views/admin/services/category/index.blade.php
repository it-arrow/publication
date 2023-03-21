@extends('admin.includes.main')
@section('title')Categories -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Categories</h4>
                </div>
            </div>
        </div>
        @component('components.breadcrumb-form')
        @slot('section')
        category
        @endslot
        @endcomponent
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('category.create')}}" class="btn btn-success">Add Category</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Name </th>
                    {{-- <th>Icon</th> --}}
                    {{-- <th>Featured</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($categories)>0)
                    @foreach ($categories as $category)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        
                        <td> {{$category->name}} </td>
                        {{-- <td>
                            @if(!empty($category->icon)) 
                                @if (file_exists('uploads/services/category/'.$category->icon))    
                                    <img src="{{asset('uploads/services/category/'.$category->icon)}}" alt="{{$category->name}}" width="80px" height="80px" class="img-fluid">
                                @else
                                    <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                                @endif
                            @else
                                <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                            @endif
                        </td> --}}
                        {{-- <td>
                            <input type="checkbox" data-id="{{ $category->id }}" name="featured" class="js-switch" {{ $category->featured == 1 ? 'checked' : '' }}>
                        </td> --}}
                        <form action="{{route('category.destroy',$category->id)}}" method="post" id="submit_form">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                
                                <a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <button class="btn btn-danger btn-sm " type="submit" data-toggle="tooltip" title='Delete'>
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
            let category_id = $(this).data('id');
            //   console.log(category_id);
    
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('category.featured_status') }}',
                data: {'status': featured_status, 'id': category_id},
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


@endsection