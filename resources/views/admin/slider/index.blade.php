@extends('admin.includes.main')
@section('title')Sliders -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Sliders</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Sliders</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            @if (count($sliders)<3)
            <div class="text-xl-end">
                <a href="{{route('sliders.create')}}" class="btn btn-success">Add Slider</a>
            </div>
            @endif
            
           
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Image</th>
                    <th>Title</th>
                    {{-- <th>Text</th> --}}
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($sliders)>0)
                                
                    @foreach ($sliders as $slider)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td>
                            @if(empty($slider->image)) 
                                <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                            @else
                                <img src="{{asset('uploads/sliders/'.$slider->image)}}" alt="{{$slider->title}}" width="80px" height="80px" class="img-fluid">
                            @endif
                        </td>
                        <td>{{$slider->title}}</td>
                        {{-- <td> {{$slider->text}} </td> --}}
                        <td>
                            <input type="checkbox" data-id="{{ $slider->id }}" name="status" class="js-switch" {{ $slider->status == 1 ? 'checked' : '' }}>
                            
                        </td>
                        <form action="{{route('sliders.destroy',$slider->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td class="project-actions">
                                
                                <a class="btn btn-info btn-sm" href="{{route('sliders.edit',$slider->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <!--<button class="btn btn-danger btn-sm" type="submit">-->
                                <!--    <i class="fas fa-trash">-->
                                <!--    </i>-->
                                <!--    Delete-->
                                <!--</button>-->
                                
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
@section('scripts')
<script>
    $(document).ready(function(){
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
        //category status
        $('.js-switch').change(function () {
            
            let slider_status = $(this).prop('checked') === true ? 1 : 0;
            
            let slider_id = $(this).data('id');
            //   console.log(category_id);
    
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('slider.update_status') }}',
                data: {'status': slider_status, 'id': slider_id},
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
