<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/plugins/revolution/css/settings.css')}}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION SETTINGS STYLES -->
    <link href="{{ asset('frontend/assets/plugins/revolution/css/layers.css')}}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION LAYERS STYLES -->
    <link href="{{ asset('frontend/assets/plugins/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION NAVIGATION STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('frontend/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/custom.css')}}" rel="stylesheet">

    <link href="{{ asset('frontend/assets/css/responsive.css')}}" rel="stylesheet">

    <!--TITLE-->
    <title>@yield('title')</title>
    @php
        $favicon_image = \App\Models\SiteSetting::first();
    @endphp
    @if (!empty($favicon_image))
        <link type="image/x-icon" href="{{asset('uploads/generalSetting/'.$favicon_image->favicon)}}" rel="shortcut icon">
    @endif
    <style>
    :root {
        --primary-color: {{$setting->primary_color}};
        --secondary-color:{{$setting->secondary_color}};
    }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <!-- Header -->
        @include('frontend.includes.nav')
        {{-- @include('frontend.includes.floating') --}}
        {{-- @if (Route::is('home')||Route::is('service.detail')||Route::is('blog.detail')||Route::is('custom_page')||Route::is('single-training')||Route::is('services'))


        @else
            @include('frontend.includes.breadcrumb')
        @endif --}}
        @yield('content')
        @include('frontend.includes.footer')
        @include('frontend.includes.script')
    </div>
    <script src="{{ asset('frontend/assets/js/jquery.js')}}"></script>
    <!--Revolution Slider-->
    <script src="{{ asset('frontend/assets/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/main-slider-script.js')}}"></script>

    <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js' crossorigin = "anonymous"></script>
    <script src="{{ asset('frontend/assets/js/owl.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/appear.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/script.js')}}"></script>
    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
        $('.match-height').matchHeight();
    </script>
    @yield('script')
    </body>

    </html>
