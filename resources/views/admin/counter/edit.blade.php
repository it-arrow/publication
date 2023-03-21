@extends('admin.includes.main')

@section('title')Edit Stat Counter -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Edit Stat Counter</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Stat Counter</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('counter.index')}}" class="btn btn-success ">View Stat Counter</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('counter.update',$counter->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="title">Title <sub>(max:50 characters)</sub> </label>
                                        <input type="text" class="form-control" name="title" value="{{old('title',$counter->title)}}" id="title" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="stat_counter">Stat Counter</label>
                                        <input type="number" class="form-control" name="stat_counter" value="{{old('stat_counter',$counter->stat_counter)}}" id="stat_counter" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="icon">Icon</label><br>
                                        <input type="file" name="icon" id="icon">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-lg-6">
                                    <img id="preview-icon-before-upload"  style="max-height:150px;" src="{{asset('uploads/counter/'.$counter->icon)}}">
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
    
    
    $('#icon').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-icon-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
    
</script>
@endsection


