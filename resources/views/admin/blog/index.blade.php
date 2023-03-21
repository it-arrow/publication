@extends('admin.includes.main')
@section('title')All Blogs -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Blogs</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Blogs</h4>
                </div>
            </div>
        </div>
        @component('components.breadcrumb-form')
        @slot('section')
        blog
        @endslot
        @endcomponent
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('blogs.create')}}" class="btn btn-success">Add Blog</a>
            </div>
            @include('admin.includes.message')
        </div>
        <table id="basic-datatable" class="table nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Image</th>
                    <th>Name </th>
                    <th>Status</th>
                    <th>Tags</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($blogs)>0)
                                
                @foreach ($blogs as $blog)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td>
                        @if(empty($blog->image)) 
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                        @else
                            @if (file_exists('uploads/blogs/'.$blog->image))
                            <img src="{{asset('uploads/blogs/'.$blog->image)}}" alt="{{$blog->name}}" width="80px" height="80px" class="img-fluid">
                            @else
                            <img src="{{asset('placeholder.jpg')}}" alt="no-image" width="80px" height="80px" class="img-fluid">
                            @endif
                            
                        @endif
                    </td>
                    <td> {{$blog->title}} </td>
                    <td>
                        <input type="checkbox" data-id="{{ $blog->id }}" name="status" class="js-switch" {{ $blog->status == 1 ? 'checked' : '' }}>
                        
                    </td>
                    <td>{{$blog->tags}}</td>
                   {{-- <td><a href="{{$blog->url}}" target="_blank">{{$blog->url}}</a></td> --}}
                    <form action="{{route('blogs.destroy',$blog->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="project-actions">
                            
                            <a class="btn btn-info btn-sm" href="{{route('blogs.edit',$blog->id)}}">
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
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });
    $(document).ready(function(){
        //datatable
        
        //category status
        $('.js-switch').change(function () {
            let blog_status = $(this).prop('checked') === true ? 1 : 0;
            // console.log(status);
            let blog_id = $(this).data('id');
            //   console.log(category_id);
    
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('blog.update_status') }}',
                data: {'status': blog_status, 'id': blog_id},
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
