
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/dgcpt/favicon.ico')}}">
    {{-- Animation Scroll --}}
    <link href="{{ asset('node_modules/aos/dist/aos.css') }}" rel="stylesheet">
    <title>ANGANE-@yield('titre')</title>

    {{-- MON CSS DEBUT  --}}
        <style>

            .titre-grandiant{
                background : linear-gradient(90deg, #60528A, #7B2974, #D097BF,#FCF2E9);
                -webkit-background-clip: text;
                background-clip: text;
                color : transparent ;
                /* animation: textGradient 3s ease infinite; */
            }
            .moncard{
                background : linear-gradient(90deg, #010217,#1A0B42, #010217,#010217);
                /* background : linear-gradient(90deg, #F9F9F9, #DEDEDE,#F9F9F9,#DEDEDE); */
                /* background : linear-gradient(90deg, #22184C,#D097BF,#7B2974, #3C1D60, #01010C); */
            }
            .mestitres{
                color : #000000;
            }
            .mesliens{
                /* color: #000000; */
                font-size: 20px;
                font-family : 'Times New Roman', Times, serif;
            }

            /* Annimation de battement de coeur */
            .nav-link-heart {
                position: relative;
                display: inline-block;
            }
            .nav-link-heart {
                position: relative;
                display: inline-block;
                transition: transform 0.3s ease; /* Ajoutez cette ligne pour une transition fluide */
            }
            .nav-link-heart:hover {
                transform: scale(1.1); /* Ajustez cette valeur selon vos besoins */
            }

            @keyframes heartbeat {
                0% {
                    transform: scale(1);
                }
                50% {
                    transform: scale(1.1);
                }
                100% {
                    transform: scale(1);
                }
            }
            

        </style>
    {{-- MON CSS FIN  --}}

    {{-- btn debt  --}}
        <link rel="stylesheet" href="{{asset('atres/btn/btn12/css/ionicons.min.css')}}">
		<link rel="stylesheet" href="{{asset('atres/btn/btn12/css/style.css')}}">


        {{-- <link rel="stylesheet" href="{{asset('atres/btn/btn18/css/ionicons.min.css')}}"> --}}
		{{-- <link rel="stylesheet" href="{{asset('atres/btn/btn18/css/style.css')}}"> --}}
    {{-- btn fn  --}}
    {{-- slect debt  --}}
         <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('admins/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admins/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    {{-- slct fn  --}}
    {{-- tblea debt  --}}
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    {{-- tblea fn  --}}

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admins/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('admins/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admins/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('admins/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admins/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admins/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admins/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admins/plugins/summernote/summernote-bs4.min.css')}}">
    <style>

    </style>
</head>
@yield('header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->

    @include('admins.menus._menus.navigation')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admins.menus._menus.navmenu')

    <!-- Content Wrapper. Contains page content -->
    @yield('corps')
    <!-- /.content-wrapper -->
    @include('admins.menus._menus.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('admins/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admins/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admins/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admins/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admins/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admins/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admins/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admins/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admins/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admins/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admins/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admins/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admins/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admins/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('admins/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admins/ist/js/pages/dashboard.js')}}"></script>
{{-- tablea debt  --}}
<script src="{{asset('admins/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admins/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admins/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- DataTables  & Plugins -->
    <script src="{{asset('admins/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admins/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admins/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


    {{-- atres btn debt  --}}
        {{-- btn12 debt  --}}
        {{-- <script src="{{asset('atres/btn/btn12/js/jquery.min.js')}}"></script>
        <script src="{{asset('atres/btn/btn12/js/popper.js')}}"></script> --}}
        {{-- <script src="{{asset('atres/btn/btn12/js/bootstrap.min.js')}}"></script> --}}
        {{-- <script src="{{asset('atres/btn/btn12/js/main.js')}}"></script> --}}
        {{-- btn 12 fn  --}}


    {{-- atres btn fn  --}}
    <script>
        $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        });
    </script>
    {{-- tblea fn  --}}
    {{-- slect debt  --}}
        <!-- Select2 -->
        <script src="{{asset('admins/plugins/select2/js/select2.full.min.js')}}"></script>
        <script>
            $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
                },
                function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

            })
            // BS-Stepper Init
            document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
            })

            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })

            myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
        </script>
        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
        <script>
            $(function () {
                bsCustomFileInput.init();
            });
             //Afficher/Cacher le profil
            $('.mprofil').hide()
            $('#profil').on('click', function (){
            $(".mprofil").fadeToggle();
            });
            // Afficher/ccacher le menu
            $('.sumenu').fadeToggle()
            $('#A').on('click', function (){
                $(".sumenu").fadeToggle();
            });
            $('#T').on('click', function (){
                $(".sumenu").fadeToggle();
            });
             // Initialiser AOS
            AOS.init();
        </script>



@include('sweetalert::alert')
@yield('footer')

</body>
</html>
