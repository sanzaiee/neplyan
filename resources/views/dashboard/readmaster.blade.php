<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://nepalyanbooks.com/settting/16127808231610959406new.jpg">
    <title>Welcome || Dashboard</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('dashboard/css/morris.css')}}"  }}rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('dashboard')}}/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dashboard')}}/css/style.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard')}}/css/custom.css" rel="stylesheet">
{{-- //for form --}}
    {{-- <link href="{{ asset('dashboard')}}/css/pages/file-upload.css" rel="stylesheet"> --}}
{{-- for iamgeupload --}}
    <link rel="stylesheet" href="{{ asset('dashboard')}}/css/dropify.min.css">
    <link rel="stylesheet" href="{{asset('dashboard')}}/css/bootstrap-wysihtml5.css">
    <link href="{{ asset('dashboard')}}/css/summernote.css" rel="stylesheet" />

    <!-- <link href="dist/css/pages/dashboard1.css" rel="stylesheet"> -->
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find i\n spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Nepaliyan</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('dashboard.includes.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @yield('content')


       
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
      @include('dashboard.includes.footer')
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="http://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="{{ asset('dashboard')}}/js/jquery-3.2.1.min.js"></script>


    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('dashboard')}}/js/popper.min.js"></script>
    <script src="{{ asset('dashboard')}}/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('dashboard')}}/js/jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dashboard')}}/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dashboard')}}/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dashboard')}}/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('dashboard')}}/js/raphael-min.js"></script>
    <script src="{{ asset('dashboard')}}/js/morris.min.js"></script>

    <script src="{{ asset('dashboard')}}/js/sticky-kit.min.js"></script>
    <script src="{{ asset('dashboard')}}/js/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="{{ asset('dashboard')}}/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="{{ asset('dashboard')}}/js/dashboard1.js"></script>
    <script src="{{ asset('dashboard')}}/js/perfect-scrollbar.jquery.min.js"></script>

    <script src="{{ asset('dashboard')}}/js/jquery.dataTables.min.js"></script>


    {{-- this for form --}}
    <script src="{{ asset('dashboard')}}/js/jasny-bootstrap.js"></script>
 <!-- summernotes CSS -->


      <!-- start - This is for export functionality only -->
      <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
      <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
      <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>


      <!-- end - This is for export functionality only -->
    @include('dashboard.includes.fileupload')
    @include('dashboard.includes.ckeditor')
    <script>
        $('.showSingle').on('click', function () {
            $(this).addClass('selected').siblings().removeClass('selected');
            $('.targetDiv').hide();
            $('#div' + $(this).data('target')).show();
        });
        $('.showSingle').first().click();
        
        </script>
      <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

       </script>

    <script>
        $('#success,#warning,#danger').delay(3000).fadeOut('slow');
    </script>
    @yield('scripts')
</body>

</html>
