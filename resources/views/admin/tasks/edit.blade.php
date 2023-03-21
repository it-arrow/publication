@extends('admin.includes.main')

@section('title')Edit Customer Order -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Edit Customer Order</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Customer Order</h4>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('customers-order.index')}}" class="btn btn-success ">View Customer Orders</a>
            </div>
        </div>
        <form action="{{route('customers-order.update',$task->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                @include('admin.includes.message')
                <div class="col-lg-4">
                    <!-- project card -->
                    <div class="card d-block h-500">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Customer Info</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name">Name</label><span class="text-danger"> *</span>
                                    <select class="form-control select2" data-toggle="select2" name="customer_id" id="customer_id" required>
                                        <option>Select</option>
                                        @if ($customers!=null)
                                            @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}" {{ old('customer_id',$task->customer_id) == $customer->id ? "selected" : "" }}>{{$customer->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="mobile_no">Mobile No.</label><span class="text-danger"> *</span>
                                    <select class="form-control select2" data-toggle="select2" name="mobile_no" id="mobile_no" required>
                                        <option>{{$task->customer->mobile_no}}</option>
                                    </select>
                                </div>  
                                
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                    <div class="card h-500">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Address</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="district_id">District</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" id="district_id" name="district_id" required>
                                    <option>Select</option>
                                    @if ($districts!=null)
                                        @foreach ($districts as $key => $district)
                                        <option value="{{$district->id}}" {{ old('district_id',$task->district_id) == $district->id ? "selected" : "" }}>{{$district->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city_id">City</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" id="city_id" name="city_id" required>
                                    <option value="{{$task->city_id}}">{{$task->city->name}}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address">Street Address</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control" name="address" value="{{old('address',$task->address)}}" placeholder="Enter Your Address" id="address" required>
                            </div>
                            
                        </div>
                    </div>
                    <!-- end card-->

                </div> <!-- end col -->
                <div class="col-lg-4" >
                    <div class="card h-500">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Order Info</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="service_id">Service</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" name="service_id" id="service_id" required>
                                    <option>Select</option>
                                    @if ($services!=null)
                                        @foreach ($services as $service)
                                        <option value="{{$service->id}}" {{ old('service_id',$task->service_id) == $service->id ? "selected" : "" }}>{{$service->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date">Date & Time</label><span class="text-danger"> *</span>
                                <input type="datetime-local" name="date" id="date" class="form-control" value="{{old('date',$task->date)}}">
                            </div>
                        </div>
                    </div>
                    <!-- end card-->
                    <div class="card h-500">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Manpower Assigned</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="category_id">Category</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id" required>
                                    <option>Select</option>
                                    @if ($categories!=null)
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ old('category_id',$task->manpower->categoryName->id) == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subcategory_id">Sub Category</label>
                                <select class="form-control select2" data-toggle="select2" name="subcategory_id" id="subcategory_id" >
                                    @if ($task->manpower->sub_category!=null)
                                        
                                    <option>{{$task->manpower->sub_category->name}}</option>
                                    @endif
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="manpower_id">Manpower</label><span class="text-danger"> *</span>
                                <select class="form-control select2" data-toggle="select2" name="manpower_id" id="manpower_id" required>
                                   <option value="{{$task->manpower_id}}">{{$task->manpower->name}}</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end card-->
                </div>
                <div class="col-lg-4" >
                    <!-- project card -->
                    <div class="card d-block h-500">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Pricing</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="due_amount">Total Cost</label><span class="text-danger"> *</span>
                                    <input type="number" class="form-control" name="due_amount" value="{{old('due_amount')}}" id="due_amount" required placeholder="Enter Total Cost">
                                </div>
                                <div class="mb-3">
                                    <label for="paid_amount">Total Amount Paid</label>
                                    <input type="number" class="form-control" name="paid_amount" value="{{old('paid_amount')}}" id="paid_amount" placeholder="Enter Paid Amount">
                                </div>
                                <div class="mb-3">
                                    <label for="additional_amount">Additional Amount</label>
                                    <input type="number" class="form-control" name="additional_amount" value="{{old('additional_amount')}}" id="additional_amount" placeholder="Enter Additonal Amount">
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
            <div class="text-xl-end">
                <button type="submit" class="btn btn-success">Update</button> 
            </div>
        </form>
        
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function (e) {
        $('#customer_id').on('change', function() {
            var customer_id = $('#customer_id').val();
            $.post('{{ route('customer.get_number_by_customer') }}',{_token:'{{ csrf_token() }}', customer_id:customer_id}, function(data){
                $('#mobile_no').html(null);
                // for (var i = 0; i < data.length; i++) {
                    $('#mobile_no').append($('<option>', {
                        // value: data.id,
                        text: data
                    }));
                // }
            });
        });
        $('#category_id').on('change', function() {
            var category_id = $('#category_id').val();
            $.post('{{ route('subcat.get_subcat_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                $('#subcategory_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#subcategory_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
            get_manpower_by_category();
        });
        function get_manpower_by_category(){
            var category_id = $('#category_id').val();
            $.post('{{ route('manpower.get_manpower_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                $('#manpower_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#manpower_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
        }
        $('#district_id').on('change', function() {
            var district_id = $('#district_id').val();
            $.post('{{ route('city.get_city_by_district') }}',{_token:'{{ csrf_token() }}', district_id:district_id}, function(data){
                $('#city_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#city_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
        });

    });
</script>

@endsection
