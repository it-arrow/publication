@extends('admin.includes.main')
@section('title')Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<style>
.hide{
    display:none;
}
</style>
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
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Settings</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Checkout Steps -->
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#general-setting" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link rounded-0 active">
                                    <i class="mdi mdi-account-circle font-18"></i>
                                    <span class="d-none d-lg-block">General Setting</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contact-info" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                    <i class="mdi mdi-phone-in-talk font-18"></i>
                                    <span class="d-none d-lg-block">Contact Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#social-links" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-cash-multiple font-18"></i>
                                    <span class="d-none d-lg-block">Social Links</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#breadcrumb" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-image font-18"></i>
                                    <span class="d-none d-lg-block">Breadcrumb Image</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Steps Information -->
                        <div class="tab-content">

                            <!-- Site Setting-->
                            <div class="tab-pane show active" id="general-setting">
                                @if ($setting!=null)
                                <form action="{{route('general.update',$setting->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    
                                @endif
                                    <div class="row">
                                        @include('admin.includes.message')
                                        <div class="col-lg-4">
                                            <h4 class="mt-2">Site Setting</h4>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="site-name" class="form-label">Site Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" placeholder="Enter site name" name="site_name" value="{{old('site_name', $setting!=null ? $setting->site_name : '' )}}" id="site-name" required />
                                                </div>
                                            </div> <!-- end row -->
                                            <h4 class="mt-2">Colors </h4>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="primary-color" class="form-label">Primary Color</label>
                                                    <input class="form-control" type="text" placeholder="Enter hex code(#FF5733)" name="primary_color" value="{{old('primary_color',$setting!=null ? $setting->primary_color : '')}}" id="primary-color" required />
                                                </div>
                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="secondary-color" class="form-label">Secondary Color</label>
                                                    <input class="form-control" type="text" placeholder="Enter hex code(#FF5733)" name="secondary_color" value="{{old('secondary_color',$setting!=null ? $setting->secondary_color : '')}}" id="secondary-color" required />
                                                </div>
                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="secondary-color" class="form-label">Office Hours</label>
                                                    <input type="text" name="office_hr" class="form-control" value="{{ old('office_hr',$setting->office_hr) }}" placeholder="Mon - Sat : 09.00am to 18.00pm">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <!-- Custom Switch -->
                                                    <div class="d-flex">
                                                        <label class="form-check-label" for="enable_popup">Enable PopUp</label>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="enable_popup" name="enable_popup" {{$setting->popup_status==1 ? 'checked' : ''}}>
                                                        </div>
                                                    </div>
                                                    @if ($setting->popup_status==1)
                                                    <div class="popup mt-2">
                                                        <input class="form-control" type="file" name="popup" id="popup"/>
                                                        @if ($setting->popup!=null)
                                                        <img src="{{asset('uploads/popup/'.$setting->popup)}}" alt="" class="img-fluid" width="100px" />
                                                        @endif
                                                        <img id="preview-popup-before-upload"  height="100" class="rounded me-2 mt-2">
                                                        <br>
                                                        <div class="">
                                                        <label class="form-check-label" for="popup_url">Pop Up Redirect Link</label>
                                                        <input type="url" class="form-control" name="popup_url" id="popup_url" value="{{ old('popup_url',$setting->popup_url) }}" placeholder="Enter Url">
                                                        </div>
                                                    </div> 
                                                    @else
                                                    <div class="popup hide mt-2">
                                                        <input class="form-control" type="file" name="popup" id="popup"/>
                                                        @if ($setting->popup!=null)
                                                        <img src="{{asset('uploads/popup/'.$setting->popup)}}" alt="" class="img-fluid" width="100px" />
                                                        @endif
                                                        <img id="preview-popup-before-upload"  height="100" class="rounded me-2 mt-2">
                                                        <div class="">
                                                            <label class="form-check-label" for="popup_url">Pop Up Redirect Link</label>
                                                            <input type="url" class="form-control" name="popup_url" id="popup_url" placeholder="Enter Url">
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div> <!-- end row -->
                                            
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="secondary-color" class="form-label">Company Brochure</label>
                                                    <input class="form-control" type="file"  name="brochure" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-8">
                                            <h4 class="mt-2">Logo & Favicon </h4>

                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-centered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="mb-3">
                                                                    <label for="logo" class="form-label">Site Logo <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="file" name="logo" id="logo" />
                                                                </div>
                                                                @if ($setting!=null)
                                                                <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="" class="img-fluid" width="100px" />
                                                                @endif
                                                                <img id="preview-logo-before-upload"  height="100" class="rounded me-2">
                                                            </td>
                                                            <td>
                                                                <div class="mb-3">
                                                                    <label for="sticky_logo" class="form-label">Sticky Logo</label>
                                                                    <input class="form-control" type="file" name="sticky_logo" id="sticky_logo" />
                                                                </div>
                                                                @if ($setting!=null)
                                                                <img src="{{asset('uploads/generalSetting/'.$setting->sticky_logo)}}" alt="" class="img-fluid" width="100px" />
                                                                @endif
                                                                <img id="preview-sticky-logo-before-upload"  height="100" class="rounded me-2">
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>
                                                                <div class="mb-3">
                                                                    <label for="footer_logo" class="form-label">Footer Logo </label>
                                                                    <input class="form-control" type="file" name="footer_logo" id="footer_logo" />
                                                                </div>
                                                                @if ($setting!=null)
                                                                <img src="{{asset('uploads/generalSetting/'.$setting->footer_logo)}}" alt="" class="img-fluid" width="100px" />
                                                                @endif
                                                                <img id="preview-footer-logo-before-upload"  height="100" class="rounded me-2">
                                                            </td>
                                                            <td>
                                                                <div class="mb-3">
                                                                    <label for="favicon" class="form-label">Favicon <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="file" name="favicon" id="favicon" />
                                                                </div>
                                                                @if ($setting!=null)
                                                                <img src="{{asset('uploads/generalSetting/'.$setting->favicon)}}" alt="" class="img-fluid" width="100px" />
                                                                @endif
                                                                <img id="preview-favicon-before-upload"  height="50" class="rounded me-2"> 
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                        </div> <!-- end col --> 
                                        <div class="col-lg-12">
                                            <h4 class="mt-2">Iframe</h4>
                                            <textarea class="form-control" name="iframe" rows="5">{{old('iframe',$setting->iframe)}}</textarea>
                                        </div>
                                    </div> <!-- end row-->
                                    <div class="row mt-2">
                                        <div class="text-sm-center">
                                            <button type="submit"  class="btn btn-danger">
                                                <i class="mdi mdi-cash-multiple me-1"></i> Save </button>
                                        </div>
                                    </div>
                                </form>           
                            </div>
                            <!-- End Site Setting-->

                            <!-- Contact Info-->
                            <div class="tab-pane" id="contact-info">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mt-2">Contact Info</h4>
                                        <p class="text-muted mb-3">You can leave optional field empty.</p>
                                            @if ($setting!=null)
                                            <form action="{{route('contact.update',$setting->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                            
                                            @endif
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="primary-address" class="form-label">Primary Address <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" placeholder="Enter your address" id="primary-address" name="primary_address" value="{{old('primary_address',$setting!=null ? $setting->primary_address : '')}}" required/>
                                                    </div>
                                                </div>
                                                {{--<div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="whatsapp-no" class="form-label">WhatsApp Number </label>
                                                        <input class="form-control" type="text" placeholder="98xxxxxxxx" id="whatsapp-no" name="whatsapp_no" value="{{old('whatsapp_no',$setting!=null ? $setting->whatsapp_no : '')}}"/>
                                                    </div>
                                                </div>--}}
                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="primary-email-address" class="form-label">Primary Email Address <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="email" placeholder="Enter your email" id="primary-email-address" name="primary_email" value="{{old('primary_email',$setting!=null ? $setting->primary_email : '')}}" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="secondary-email-address" class="form-label">Secondary Email Address <sub>( optional )</sub></label>
                                                        <input class="form-control" type="email" placeholder="Enter your email" id="secondary-email-address" name="secondary_email" value="{{old('secondary_email',$setting!=null ? $setting->secondary_email : '')}}" />
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="primary-phone" class="form-label">Primary Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" placeholder="98xxxxxxxx" id="primary-phone" name="primary_phone" value="{{old('primary_phone',$setting!=null ? $setting->primary_phone : '')}}" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="secondary-phone" class="form-label">Secondary Phone <sub>( optional )</sub></label>
                                                        <input class="form-control" type="text" placeholder="98xxxxxxxx" id="secondary-phone" name="secondary_phone" value="{{old('secondary_phone',$setting!=null ? $setting->secondary_phone : '')}}"/>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                            
                                            <div class="row mt-4">
                                                <div class="col-sm-6">
                                                    <div class="text-sm-end">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="mdi mdi-cash-multiple me-1"></i> Save </button>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </form>
                                    </div>         
                                </div> <!-- end row-->
                            </div>
                            <!-- End Contact Info-->

                            <!-- Payment Content-->
                            <div class="tab-pane" id="social-links">
                                <div class="row">

                                    <div class="col-lg-8">
                                        <h4 class="mt-2">Social Media Links</h4>
                                        @if ($social_medias!=null)
                                        @foreach ($social_medias as $social_media)
                                        <div class="border p-3 mb-3 rounded">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <i class="{{$social_media->icon}}"></i>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="form-check"> 
                                                        <label class="form-check-label font-16 fw-bold">{{$social_media->name}}</label>
                                                    </div>
                                                    <p class="mb-0 ps-3 pt-1">{{$social_media->link}}</p>
                                                </div>
                                                <div class="col-sm-4 text-sm-end mt-3 mt-sm-0">
                                                    <a onclick="editmodal('{{$social_media->id}}');" class="d-inline-block" ><i class="fa-solid fa-pen-to-square mr-3"></i></a>
                                                    <a href="{{route('delete.social',$social_media->id)}}" class="d-inline-block"><i class="fa-solid fa-trash"></i></a>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif

                                    </div> <!-- end col -->

                                    <div class="col-lg-4">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="border-dashed border-2 border h-100 w-100 rounded d-flex align-items-center justify-content-center">
                                                    <a href="javascript:void(0);" class="text-center text-muted p-2" data-bs-toggle="modal" data-bs-target="#SocialMedia">
                                                        <i class="mdi mdi-plus h3 my-0"></i> <h4 class="font-16 mt-1 mb-0 d-block">Add New Social Link</h4>
                                                    </a>
                                                </div>
                                            </div> <!-- end card-body -->
                                        </div> <!-- end card -->

                                    </div> <!-- end col -->            
                                </div> <!-- end row-->
                            </div>
                            <!-- End Payment Information Content-->

                            <div class="tab-pane" id="breadcrumb">
                                <div class="card-body">
                                    <form action="{{route('breadcrumb_image',$setting->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div id="breadcrumb_image" class="row">
                                            <div class="remove col-md-6">
                                                <div class="img-upload-preview">
                                                    <img loading="lazy"  src="{{ asset('uploads/breadcrumb/'.$setting->breadcrumb) }}" alt="" class="img-responsive" style="max-height:200px; max-width:-webkit-fill-available">
                                                    <input type="hidden" name="previous_profile_img" value="{{ $setting->breadcrumb }}">
                                                    <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div> <!-- end tab content-->

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->
<!-- Modal -->
<div class="modal fade" id="SocialMedia" tabindex="-1" aria-labelledby="SocialMediaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SocialMediaLabel">Add New Social Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('social.store')}}" method="post">
                @csrf
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label for="social-media-icon" class="form-label">Social Media Icon (<a href="https://fontawesome.com/icons" target="_blank">Font Awesome Icon</a>)</label>
                    <input type="text" class="form-control" name="icon" id="social-media-icon" placeholder="fa-solid fa-facebook-f">
                </div>
                <div class="mb-3">
                    <label for="social-media-name" class="form-label">Social Media Name</label>
                    <input type="text" class="form-control" name="name" id="social-media-name" placeholder="Facebook">
                </div>
                <div class="mb-3">
                    <label for="social-media-link" class="form-label">Social Media Link</label>
                    <input type="url" class="form-control" name="link" id="social-media-link" placeholder="https://www.facebook.com/">
                </div>

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Social Media</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editSocial" tabindex="-1" aria-labelledby="SocialMediaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script type="text/javascript">
    function editmodal(id){
        $.post('{{ route('social.edit') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
            $('#editSocial #modal-content').html(data);
            $('#editSocial').modal('show', {backdrop: 'static'});
        });
    }  
    $(document).ready(function (e) {
        $('#enable_popup').change(function(){
            if($(this).is(":checked")) {
                $('.popup').removeClass('hide');
            } else {
                $('.popup').addClass('hide');
            }
        });
        $('#popup').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-popup-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
        $('#logo').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-logo-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
        $('#sticky_logo').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-sticky-logo-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
        $('#footer_logo').change(function(){
            
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-footer-logo-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
        
        
        $('#favicon').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-favicon-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });

        $('.remove-files').on('click', function(){
                $(this).parents(".remove").remove();
        });
        $("#breadcrumb_image").spartanMultiImagePicker({
            fieldName: 'breadcrumb',
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
