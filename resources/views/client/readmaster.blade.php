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
        <link rel="icon" type="image/x-icon" href="favicon.ico?v=2"  />

    <link rel="icon" type="image/png" sizes="16x16" href="{{ $setting->fav ?? '' }}">
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
    <link href="{{ asset('dashboard')}}/css/pages/file-upload.css" rel="stylesheet">
{{-- for iamgeupload --}}
    <link rel="stylesheet" href="{{ asset('dashboard')}}/css/dropify.min.css">
    <link rel="stylesheet" href="{{asset('dashboard')}}/css/bootstrap-wysihtml5.css">
    <link href="{{ asset('dashboard')}}/css/summernote.css" rel="stylesheet" />

    <!-- <link href="dist/css/pages/dashboard1.css" rel="stylesheet"> -->
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
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
      @include('client.includes.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        {{--  @include('client.includes.navread')  --}}

        {{--  <div class="page-wrapper">  --}}
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @include('message')
            </div>
           @yield('content')
        {{--  </div>  --}}
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
      @include('client.includes.footer')
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
    <script>
        $('.showSingle').on('click', function () {
            $(this).addClass('selected').siblings().removeClass('selected');
            $('.targetDiv').hide();
            $('#div' + $(this).data('target')).show();
        });
        $('.showSingle').first().click();
    </script>

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
        $('#success,#warning,#danger').delay(3000).fadeOut('slow');
    </script>
</body>

</html>
