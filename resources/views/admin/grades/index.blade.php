@extends('admin.includes.main')
@section('title')Grades -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Grades</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Grades</h4>
                </div>
            </div>
        </div>

        {{-- <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('grades.create')}}" class="btn btn-success">Add Grade</a>
            </div>

        </div> --}}
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-7">
                <div class="card p-3">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @if(count($grades)>0)

                            @foreach ($grades as $grade)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td>{{$grade->name}}</td>
                                <form action="{{route('grades.destroy',$grade->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <td class="project-actions">

                                        <a class="btn btn-info btn-sm" href="{{route('grades.edit',$grade->id)}}">
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
            <div class="col-lg-5">
                <div class="card p-3">
                    <h4 class="d-flex justify-content-center">Add Grade</h4>

                @include('admin.includes.message')
                <form action="{{route('grades.store')}}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 px-2">
                                <label for="grade">Grade</label><span class="text-danger"> * </span>
                                <input type="text" class="form-control" name="grade" value="{{old('grade')}}" required>
                            </div>

                        </div>

                    </div>
                    <div class="btn-group mb-2 ms-2">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
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
