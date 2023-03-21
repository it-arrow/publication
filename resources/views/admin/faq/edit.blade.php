@extends('admin.includes.main')

@section('title')Edit Faq -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Edit Faq</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Faq</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('faq.index')}}" class="btn btn-success ">View Faq</a>
                        </div>
                    </div>
                    @include('admin.includes.message')
                    <form action="{{route('faq.update',$faq->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 px-2">
                                    <label for="question">Question</label><span class="text-danger"> * </span>
                                    <input type="text" class="form-control" name="question" value="{{old('question',$faq->question)}}" required>
                                </div>
                                <div class="mb-3 px-2">
                                    <label for="answer">Answer</label><span class="text-danger"> * </span>
                                    <textarea name="answer" id="" class="form-control" rows="5">{{ old('answer',$faq->answer) }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="btn-group mb-2 ms-2">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



