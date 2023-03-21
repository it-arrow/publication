@extends('admin.includes.main')
@section('title')Payment History -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Payment History</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Payment History</h4>
                </div>
            </div>
        </div>
        <table id="basic-datatable" class="table nowrap w-100">
            {{-- <div class="d-flex justify-content-end">
                Date: {{date('d F Y')}} <br>
            </div> --}}
            <thead>
                <tr>
                    <th>#</th>
                    <th>Payment Amount</th>
                    <th>Payment Date</th>
                    <th>Service Name</th>
                    <th>Customer Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manpower->histories as $history)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>Rs. {{$history->payment_amount}}</td>
                    <td>{{$history->created_at->format('d F Y')}}</td>
                    <td>{{$history->task->service->name}}</td>
                    <td>{{$history->task->customer->name}}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
@endsection 