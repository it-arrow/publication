@extends('admin.includes.main')

@section('title')Edit Payment Partner -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Edit Payment Partner</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Payment Partner</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('payment.index')}}" class="btn btn-success ">View Payment Partner</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('payment.update',$payment->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name">Payment Partner Name</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name',$payment->name)}}" id="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="account_name">Account Name</label>
                                        <input type="text" class="form-control" name="account_name" value="{{old('account_name',$payment->account_name)}}" id="account_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="account_no">Account Number</label>
                                        <input type="text" class="form-control" name="account_no" value="{{old('account_no',$payment->account_no)}}" id="account_no" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="image">Image</label><br>
                                        <input type="file" name="image" id="image">
                                    </div>
                                    <div class="mb-3">
                                        <img id="preview-image-before-upload"  style="max-height:150px;" src="{{asset('uploads/payment/'.$payment->image)}}">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="text-xl-end">
                                <button type="submit" class="btn btn-success">Save</button> 
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
            
    $(document).ready(function (e) {
    
    
    $('#image').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
    
</script>
@endsection


