@extends('admin.includes.main')
@section('title')Edit Opportunity -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Opportunity</h3>
                            <a href="{{route('opportunity.index')}}" class="btn btn-success btn-sm float-right">View Opportunity</a>
                        </div>
                        <div class="card-body">
                            @include('admin.includes.message')

                            <form action="{{route('opportunity.update',$opportunity->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Title</label> <span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="title" value="{{old('title',$opportunity->title)}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">No. of Vacancy</label>
                                            {{-- <select name="type" class="form-control">
                                                <option value="" disabled>Select Type</option>
                                                <option value="admission" @if($opportunity->type=='admission') selected @endif>Admission Procedure</option>
                                                <option value="job_vacancy" @if($opportunity->type=='job_vacancy') selected @endif>Job Vacancy</option>
                                                <option value="volunteer" @if($opportunity->type=='volunteer') selected @endif>Volunteer Internship</option>
                                            </select> --}}
                                            <input type="number" class="form-control" name="vacancy_no" value="{{old('vacancy_no',$opportunity->vacancy_no)}}" required>

                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Content</label><br>
                                            <textarea name="description">{{old('description',$opportunity->description)}}</textarea>
                                        </div>
                                    </div>
                                </div> 
                                <button type="submit" class="btn btn-success btn-sm float-right">Save</button> 
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection


