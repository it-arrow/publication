@extends('admin.includes.main')
@section('title')Add Opportunity -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Opportunity</h3>
                            <a href="{{route('opportunity.index')}}" class="btn btn-success btn-sm float-right">View Opportunity</a>
                        </div>
                        <div class="card-body">
                            @include('admin.includes.message')

                            <form action="{{route('opportunity.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Title</label> <span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">No of Vacancy</label><span class="text-danger"> * </span>
                                            {{-- <select name="type" class="form-control">
                                                <option value="" disabled selected>Select Type</option>
                                                <option value="admission">Admission Procedure</option>
                                                <option value="job_vacancy">Job Vacancy</option>
                                                <option value="volunteer">Volunteer Internship</option>
                                            </select> --}}
                                            <input type="number" class="form-control" name="vacancy_no" value="{{old('vacancy_no')}}" required>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Content</label><br>
                                            <textarea name="description">{{old('description')}}</textarea>
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


