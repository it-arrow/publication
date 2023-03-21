@include('admin.includes.head')
@include('admin.includes.header')
@include('admin.includes.sidebar')
<body>
    <!-- Begin page -->
    <div class="wrapper">
        <div class="content-page">
            @yield('content')
        </div>
    </div>
    <!-- END wrapper -->
@include('admin.includes.script')
@yield('scripts')
</body>

</html> 