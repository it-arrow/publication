@extends('admin.includes.main')
@section('title')All Customers -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Customers</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Customers</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('customers.create')}}" class="btn btn-success">Add Customer</a>
            </div>
            @include('admin.includes.message')
        </div>
        
        <!-- end page title -->
        <table id="basic-datatable" class="table nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Name</th>
                    <th>Address </th>
                    <th>Phone</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($customers)>0)
                @foreach ($customers as $customer) 
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td><a href="{{route('customers.show',$customer->id)}}" target="_blank">{{$customer->name}}</a> (<a href="{{route('customer.payment.history',$customer->id)}}" target="_blank">payment history</a>)</td>
                    <td>{{$customer->address}}, {{$customer->city->name}}</td>
                    <td>{{$customer->mobile_no}}</td>
                    <td>Rs. {{$customer->due_amount+$customer->additional_amount}}</td>
                    <td>Rs. {{$customer->paid_amount}}</td>
                    <td>Rs. {{($customer->due_amount+$customer->additional_amount)-$customer->paid_amount}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <button class="btn btn-primary">Options <i class="fa-solid fa-angle-down"></i> </button>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                
                                <a href="{{route('customers.show',$customer->id)}}" class="dropdown-item"><i class="fa-solid fa-eye"></i> Show</a>
                                
                                <a href="{{route('customers.edit',$customer->id)}}" class="dropdown-item"><i class="fas fa-pencil-alt"></i> Edit</a>
                                
                                <form action="{{route('customers.destroy',$customer->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                    
                                </form>
                            </div>
                        </div>
                    </td>
                    

                </tr>
                
                @endforeach
            
            @endif
            </tbody>
        </table>
        
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->

@endsection
