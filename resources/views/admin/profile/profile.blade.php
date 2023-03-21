@extends('admin.includes.main')
@section('title')Profile -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card text-center">
                    <div class="card-body">
                        @if (Auth::user()->profile_image!=null)
                        <img src="{{ asset('admin/image/'.Auth::user()->profile_image) }}" class="rounded-circle avatar-lg img-thumbnail">
                        @else
                        <img src="{{ asset('admin/assets/images/users/avatar-1.jpg')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                        @endif
                        
                        <h4 class="mb-0 mt-2">{{Auth::user()->roles->first()->name}}</h4>


                        <div class="text-start mt-3">
                            
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{Auth::user()->name}}</span></p>

                            

                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">{{Auth::user()->email}}</span></p>

                            
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->

                

            </div> <!-- end col-->

            <div class="col-xl-8 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#profile" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#changePassword" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 ">
                                    Change Password
                                </a>
                            </li>
                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="profile">
                                <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Profile Info</h5>
                                    @include('admin.includes.message')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">User Name</label>
                                                <input type="text" class="form-control" id="username" placeholder="Enter user name" name="name" value="{{old('name',Auth::user()->name)}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('name',Auth::user()->email)}}" required>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                    
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="image">Profile Image</label>
                                            <div id="profile_image" class="row">
                                                <div class="remove col-md-6">
                                                    <div class="img-upload-preview">
                                                        <img loading="lazy"  src="{{ asset('admin/image/'.Auth::user()->profile_image) }}" alt="" class="img-responsive" style="max-height:150px; max-width:-webkit-fill-available">
                                                        <input type="hidden" name="previous_profile_img" value="{{ Auth::user()->profile_image }}">
                                                        <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </form>
                            </div> <!-- end tab-pane -->
                            <!-- end about me section content -->

                            <div class="tab-pane" id="changePassword">
                                <form action="{{route('profile.update_password')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Change Password</h5>
                                    @include('admin.includes.message')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Current Password</label>
                                                <input type="password" class="form-control" name="current_password" placeholder="Enter Current Password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">New Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Enter New Password" required>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Confirm Password</label>
                                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </form>

                            </div>
                            <!-- end timeline content-->

                            

                        </div> <!-- end tab-content -->
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        

    </div> <!-- container -->
</div> <!-- content -->

@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function (e) {
        $('.remove-files').on('click', function(){
            $(this).parents(".remove").remove();
        });
        $("#profile_image").spartanMultiImagePicker({
            fieldName: 'profile_image',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-md-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });

      
    });

</script>
@endsection