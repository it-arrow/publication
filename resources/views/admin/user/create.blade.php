@extends('admin.includes.main')
@section('title')Role Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add User</h3>
                            <a href="{{route('users.index')}}" class="btn btn-success btn-sm float-right">View Users</a>
                        </div>
                        <div class="col-md-12 p-0">
                            @include('admin.includes.message')
                        </div>
                        <div class="card-body">
                            <form action="{{route('users.store')}}" method="post">
                                @csrf
                                <div class="row pb-5">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                                <select class="form-control" name="role">
                                                  <option selected disabled>---Select role---</option>
                                                  @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                  @endforeach
                                                </select>
                                                {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="confirmPassword">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="confirmPassword" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Select School</label><span class="text-danger"> * </span>
                                            <select name="school" class="form-control">
                                                <option value="" disabled selected>Select School</option>
                                                @foreach ($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="number" class="form-control" name="vacancy_no" value="{{old('vacancy_no')}}" required> --}}
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
@endsection

