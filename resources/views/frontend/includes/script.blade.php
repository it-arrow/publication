

<!-- Dashboard App js -->
{{-- <script src="{{asset('admin/assets/js/pages/demo.dashboard.js')}}"></script> --}}


<!-- Vendor js -->
<script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<!-- Datatables js -->
<script src="{{asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
<!-- Datatable Init js -->
<script src="{{asset('admin/assets/js/pages/demo.datatable-init.js')}}"></script>
<script src="{{asset('admin/assets/vendor/select2/js/select2.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


<script src="{{asset('assets/js/spartan-multi-image-picker-min.js')}}"></script>


<!-- App js -->
<script src="{{asset('admin/assets/js/app.js')}}"></script>
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
    function get_subcategories_by_category(){
    var category_id = $('#category_id').val();
    $.post('{{ route('subcat.get_servicesubcat_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
        $('#subcategory_id').html(null);

        for (var i = 0; i < data.length; i++) {
            $('#subcategory_id').append($('<option>', {
                value: data[i].id,
                text: data[i].name
            }));
        }
    });
}
</script>

