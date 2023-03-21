
@extends('admin.includes.main')

@section('title'){{$opportunity->title}} -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$opportunity->name}}</h3>
                            <a href="{{route('opportunity.index')}}" class="btn btn-success btn-sm float-right">View All Opportunity</a>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <p><span class="font-weight-bold">Title: </span>{{$opportunity->title}}</p>
                                <p><span class="font-weight-bold">No. of Vacancy: </span>{{$opportunity->vacancy_no}}</p>
                                <p><span class="font-weight-bold">Content: </span>{!! $opportunity->description !!}</p>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection


