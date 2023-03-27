<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="" />
        <meta content="Coderthemes" name="author" />
        <title>@yield('title')</title>

        @php
            $favicon_image = \App\Models\SiteSetting::first();
        @endphp
        @if (!empty($favicon_image))
            <link type="image/x-icon" href="{{asset('uploads/generalSetting/'.$favicon_image->favicon)}}" rel="shortcut icon">
        @endif


        <!-- Datatables css -->
        <link href="{{asset('admin/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel='stylesheet' href='{{asset('admin/assets/css/bootstrap-tagsinput.css')}}'>

        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/toastr.min.css')}}">
        <link href="{{asset('admin/assets/vendor/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Theme Config Js -->
        <script src="{{asset('admin/assets/js/hyper-config.js')}}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">

        <!-- App css -->
        <link href="{{asset('admin/assets/css/app-saas.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>



</head>
