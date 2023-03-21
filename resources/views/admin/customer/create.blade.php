@extends('admin.includes.main')

@section('title')Add Customer -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Add Customers</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Customers</h4>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('customers.index')}}" class="btn btn-success ">View Customer</a>
            </div>
        </div>
        <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @include('admin.includes.message')
                <div class="col-lg-4">
                    <!-- project card -->
                    <div class="card d-block h-600">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Customer Info</h5>
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
                                    <label for="mobile_no">Mobile No.</label><span class="text-danger"> *</span>
                                    <input type="text" class="form-control" name="mobile_no" value="{{old('mobile_no')}}" id="mobile_no" required placeholder="98xxxxxxxx">
                                </div>  
                                <div class="mb-3">
                                    <label for="landline_no">Landline No.</label>
                                    <input type="text" class="form-control" name="landline_no" value="{{old('landline_no')}}" placeholder="01xxxxxxx">
                                </div> 
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4" >
                    <div class="card h-600">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Address</h5>
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
                {{-- <div class="col-lg-4">
                    <!-- project card -->
                    <div class="card d-block h-500">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Pricing</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="due_amount">Due Amount</label><span class="text-danger"> *</span>
                                    <input type="number" class="form-control" name="due_amount" value="{{old('due_amount')}}" id="due_amount" required placeholder="Enter Due Name">
                                </div>
                                <div class="mb-3">
                                    <label for="paid_amount">Total Amount Paid</label>
                                    <input type="number" class="form-control" name="paid_amount" value="{{old('paid_amount')}}" id="paid_amount" placeholder="Enter Paid Amount">
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>  --}}

            </div>
            {{-- <div class="row">
                <div class="col-lg-4" >
                    <div class="card h-600">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Order Info</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="service_id">Service</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" name="service_id" id="service_id" required>
                                    <option>Select</option>
                                    @if ($services!=null)
                                        @foreach ($services as $service)
                                        <option value="{{$service->id}}" {{ old('service_id') == $service->id ? "selected" : "" }}>{{$service->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date">Date & Time</label><span class="text-danger"> *</span>
                                <input type="datetime-local" name="date" id="date" class="form-control" value="{{old('date')}}">
                            </div>
                        </div>
                    </div>
                    <!-- end card-->

                </div>
            </div> --}}
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
    });
</script>

@endsection
