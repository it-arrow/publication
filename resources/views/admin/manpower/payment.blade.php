@extends('admin.includes.main')
@section('title')Payment Info -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Manpowers</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manpowers</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
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
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($manpowers)>0)
                                
                @foreach ($manpowers as $manpower)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td>{{$manpower->name}} <br><sub><a href="{{route('payment.history',$manpower->id)}}" target="_blank">payment history</a></sub> </td>
                    <td>{{$manpower->address}}, {{$manpower->city_detail->name}}</td>
                    <td>{{$manpower->primary_phone}}</td>
                    <td>Rs. {{$manpower->total_amount}}</td>
                    <td>Rs. {{$manpower->paid_amount}}</td>
                    <td>Rs. {{$manpower->due_amount}}</td>
                    
                    {{-- <td class="project-actions">
                        <a class="btn btn-info btn-sm" onclick="editPayment('{{$manpower->id}}');"">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        
                    </td> --}}

                </tr>
                
                @endforeach
            
            @endif
            </tbody>
        </table>
        
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->
<div class="modal fade" id="editPayment" tabindex="-1" aria-labelledby="editPaymentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
     function editPayment(id){
        $.post('{{ route('manpower_payment.edit') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
            $('#editPayment #modal-content').html(data);
            $('#editPayment').modal('show', {backdrop: 'static'});
            
        });
    } 
</script>

@endsection