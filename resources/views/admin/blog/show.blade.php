@extends('admin.includes.main')

@section('title'){{$blog->title}} -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$blog->title}}</h3>
                            <a href="{{route('blogs.index')}}" class="btn btn-success btn-sm float-right">View All Blogs</a>
                        </div>
                        <div class="card-body">
                            <img class="card-img-top" src="{{asset('uploads/blogs/'.$blog->image)}}" alt="{{$blog->title}}">
                            <div class="card-body">
                                <p>{!! $blog->description !!}</p>
                            </div>

                        </div> 
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection


