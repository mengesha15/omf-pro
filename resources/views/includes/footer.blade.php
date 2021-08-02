<footer class="main-footer">
    <strong>Copyright &copy; <a href="#">Oromia microfinance</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>OMF,</b> Ethiopia
    </div>
</footer>
<!-- jQuery -->

{{-- <script src="{{ asset('js/jQuery_v1.16.0.js') }}"></script> --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<!-- AdminLTE App -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ 'plugins/datatables-buttons/js/buttons.colVis.min.js' }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('dist/js/demo.js') }}"></script>

</body>

<script>
    $(document).ready(function() {
        $('#employee_registration_form').validate({
            rules: {
                first_name: {
                    required: true
                },
                middle_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                employee_salary: {
                    required: true,
                    min : 2500,
                    number: true,
                },
                phone_number: {
                    required: true,
                    number: true,

                },
                birth_date:{
                    required :true,
                    date:true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

</html>
