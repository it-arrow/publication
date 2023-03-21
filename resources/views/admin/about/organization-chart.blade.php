@extends('admin.includes.main')
@section('title')Organization Chart -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Organization Chart</li>
                    </ol>
                </div>
                <h4 class="page-title">Organization Chart</h4>
            </div>
        </div>
    </div>
     @component('components.breadcrumb-form')
        @slot('section')
        chart
        @endslot
    @endcomponent
    <div class="row">
        <div class="card">
            @if ($chart!=null)
                <form action="{{route('organization.chart.update',$chart->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            @endif
                <div class="card-body">
                    @include('admin.includes.message')
                    <div class="col-md-6">
                        <input type="file" name="organization_chart" id="chart" class="form-control">
                        <div class="my-3">
                            @if ($chart->organization_chart!=null)
                            <img id="preview-chart-before-upload"  style="max-height:150px;" src="{{asset('uploads/about/chart/'.$chart->organization_chart)}}">
                            @else
                            <img id="preview-chart-before-upload"  style="max-height:150px;">
                            @endif
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

@endsection
@section('scripts')
<script type="text/javascript">
      
    $(document).ready(function (e) {
    $('#chart').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-chart-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });     
    });
    
</script> 
@endsection





