@extends('admin.includes.main')
@section('title')All Customers Order -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Customers Order</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Customers Order</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('customers-order.create')}}" class="btn btn-success">Add Customer Order</a>
            </div>
            @include('admin.includes.message')
        </div>
        <!-- end page title -->
        <table id="basic-datatable" class="table nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Service</th>
                    <th>Customer </th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Date & Time</th>
                    <th>Status</th>
                    <th>Manpower Assigned</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        
            <tbody>
                @if(count($tasks)>0)
                                
                    @foreach ($tasks as $task)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td>{{$task->service->name}}</td>
                        <td>{{$task->customer->name}}</td>
                        <td>{{$task->address}}</td>
                        <td>{{$task->customer->mobile_no}}</td>
                        <td>{{ date('d M Y', strtotime($task->date)) }}<br>{{ date('h:i A', strtotime($task->date)) }}</td>
                        <td>
                            @if ($task->status=='Completed')
                            <span class="badge bg-success"> {{$task->status}}</span></td>
                            @elseif($task->status=='In Progress')
                            <span class="badge bg-warning"> {{$task->status}}</span></td>
                            @elseif($task->status=='Assigned')
                            <span class="badge bg-primary"> {{$task->status}}</span></td>
                            @else
                            <span class="badge bg-danger"> {{$task->status}}</span></td>
                            @endif
                            
                        <td>{{$task->manpower!=null ? $task->manpower->name : 'Not Assigned'}}</td>
                        <td>Rs. {{$task->due_amount+$task->additional_amount}}</td>
                        <td>Rs. {{$task->paid_amount!=null ? $task->paid_amount : 0}}</td>
                        <td>Rs. {{$task->due_amount-$task->paid_amount}}</td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <button class="btn btn-primary">Options <i class="fa-solid fa-angle-down"></i> </button>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    
                                    <a href="{{route('customers-order.show',$task->id)}}" class="dropdown-item"><i class="fa-solid fa-eye"></i> Show</a>
                                    
                                    <a href="{{route('customers-order.add-cost',$task->id)}}" class="dropdown-item"><i class="fa-solid fa-money-bill"></i> Cost Details</a>

                                    <a class="dropdown-item" onclick="assignManpower('{{$task->id}}');">
                                        <i class="fa-solid fa-person"></i> Assign Manpower
                                    </a>

                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changeStatus{{$task->id}}">
                                        <i class="mdi mdi-alpha-s-circle "></i> Change Status
                                    </a>

                                    <form action="{{route('customers-order.destroy',$task->id)}}" method="post">
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
                    
                    <div class="modal fade" id="changeStatus{{$task->id}}" tabindex="-1" aria-labelledby="changeStatusLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="changeStatusLabel">Change Status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('order.status',$task->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body p-4">
                                    <div class="mb-3">
                                        <label for="change_status">Change Status:</label>
                                        <select class="form-control select2" data-toggle="select2" name="status" id="change_status" required>
                                            <option disabled selected>Select</option>
                                            <option value="In Progress">Work In Progress</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                @endif
            </tbody>
        </table>
        
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->
<div class="modal fade" id="assignManpower" tabindex="-1" aria-labelledby="assignManpowerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
     function assignManpower(id){
        $.post('{{ route('order.assign') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
            $('#assignManpower #modal-content').html(data);
            $('#assignManpower').modal('show', {backdrop: 'static'});
            $('#category_id').on('change', function() {
                
                var category_id = $('#category_id').val();
                $.post('{{ route('subcat.get_subcat_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                    $('#subcategory_id').html(null);
                    $('#subcategory_id').append($('<option>', {
                        value: null,
                        text: 'Select'
                    }));
                    for (var i = 0; i < data.length; i++) {
                        $('#subcategory_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].name
                        }));
                    }
                });
                get_manpower_by_category();
            });
            $('#subcategory_id').on('change', function() {
                
                var subcategory_id = $('#subcategory_id').val();
                $.post('{{ route('manpower.get_manpower_by_subcategory') }}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
                    $('#manpower_id').html(null);
                    
                    for (var i = 0; i < data.length; i++) {
                        $('#manpower_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].name
                        }));
                    }
                });
                
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
        });
    } 
</script>

@endsection