@extends('admin.includes.main')

@section('title')Add Manpower -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Add Manpowers</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Manpowers</h4>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('manpowers.index')}}" class="btn btn-success ">View Manpower</a>
            </div>
        </div>
        <form action="{{route('manpowers.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @include('admin.includes.message')
                <div class="col-lg-4">
                    <!-- project card -->
                    <div class="card d-block">
                        <h5 class="card-title bg-primary p-3 text-light text-center">General Info</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name">Name</label><span class="text-danger"> *</span>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" required placeholder="Enter Your Name">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Enter Email Address">
                                </div>
                            
                                <div class="mb-3">
                                    <label for="primary_phone">Primary Mobile No.</label><span class="text-danger"> *</span>
                                    <input type="text" class="form-control" name="primary_phone" value="{{old('primary_phone')}}" id="primary_phone" required placeholder="98xxxxxxxx">
                                </div>
                                <div class="mb-3">
                                    <label for="secondary_phone">Secondary Mobile No.</label>
                                    <input type="text" class="form-control" name="secondary_phone" value="{{old('secondary_phone')}}" placeholder="98xxxxxxxx">
                                </div>   
                                <div class="mb-3">
                                    <label for="landline_no">Landline No.</label>
                                    <input type="text" class="form-control" name="landline_no" value="{{old('landline_no')}}" placeholder="01xxxxxxx">
                                </div> 
                                <div class="mb-3">
                                    <label for="citizenship_no">Citizenship No.</label><span class="text-danger"> *</span>
                                    <input type="text" class="form-control" name="citizenship_no" value="{{old('citizenship_no')}}" placeholder="Enter Citizenship no.">
                                </div> 
                                <div class="mb-3">
                                    <label for="pan_no">Pan No.</label><span class="text-danger"> *</span>
                                    <input type="text" class="form-control" name="pan_no" value="{{old('pan_no')}}" placeholder="Enter Pan no.">
                                </div> 
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4" >
                    <div class="card">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Permanent Address</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="district">District</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" id="p_district" name="p_district" required>
                                    <option>Select</option>
                                    @if ($districts!=null)
                                        @foreach ($districts as $key => $district)
                                        <option value="{{$district->id}}" {{ old('p_district') == $district->id ? "selected" : "" }}>{{$district->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city">City</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" id="p_city" name="p_city" required>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address">Street Address</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control" name="p_address" value="{{old('address')}}" placeholder="Enter Your Address" id="address" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Temporary Address</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="district">District</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" id="district" name="district" required>
                                    <option>Select</option>
                                    @if ($districts!=null)
                                        @foreach ($districts as $key => $district)
                                        <option value="{{$district->id}}" {{ old('district') == $district->id ? "selected" : "" }}>{{$district->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city">City</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" id="city" name="city" required>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address">Street Address</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Enter Your Address" id="address" required>
                            </div>
                            
                        </div>
                    </div>
                    <!-- end card-->

                </div>
                <div class="col-lg-4" >
                    <div class="card">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Skills</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="category">Category</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" name="category" id="category" required>
                                    <option>Select</option>
                                    @if ($categories!=null)
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ old('category') == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subcategory">Sub Category</label>
                                <select class="form-control select2" data-toggle="select2" name="subcategory" id="subcategory">
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="skill">Skills</label><span class="text-danger"> *</span>
                                <input type="text" placeholder="Enter Your Skills" class="form-control" name="skill[]" data-role="tagsinput" required>
                            </div>
                        </div>
                    </div>
                    <!-- end card-->

                </div>
            </div>
            <div class="text-xl-end">
                <button type="submit" class="btn btn-success">Save</button> 
            </div>
        </form>
        
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function (e) {
        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        $('#category').on('change', function() {
            var category_id = $('#category').val();
            $.post('{{ route('subcat.get_subcat_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                $('#subcategory').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#subcategory').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
        });
        $('#district').on('change', function() {
            var district_id = $('#district').val();
            $.post('{{ route('city.get_city_by_district') }}',{_token:'{{ csrf_token() }}', district_id:district_id}, function(data){
                $('#city').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#city').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
        });
        $('#p_district').on('change', function() {
            var district_id = $('#p_district').val();
            $.post('{{ route('city.get_city_by_district') }}',{_token:'{{ csrf_token() }}', district_id:district_id}, function(data){
                $('#p_city').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#p_city').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
        });
    });
</script>

@endsection
