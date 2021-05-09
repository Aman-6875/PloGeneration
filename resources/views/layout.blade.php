<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Feb 2021 17:17:46 GMT -->
    @include('admin.includes.head')
    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


           @include('admin.includes.header')

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                   @include('admin.includes.sidebar')
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                @yield('content')
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
         <!-- JAVASCRIPT -->
         <script>
             $(document).ready(function() {
                $('#datatable').DataTable();
            });
         </script>

    <script>
        $(document).ready(function() {
            $('.course-code').select2();
        });
    </script>
         <script src="/assets/libs/jquery/jquery.min.js"></script>
         <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
         <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
         <script src="/assets/libs/simplebar/simplebar.min.js"></script>
         <script src="/assets/libs/node-waves/waves.min.js"></script>

         <!-- Required datatable js -->
         <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
         <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
         <script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
         <script src="/assets/libs/jszip/jszip.min.js"></script>
         <script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
         <script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
         <script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
         <script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
         <script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

         <!-- Responsive examples -->
         <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
         <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

         <!-- Datatable init js -->
         <script src="/assets/js/pages/datatables.init.js"></script>

         {{-- <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
         <script src="/assets/js/pages/sweet-alerts.init.js"></script> --}}
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>




         <!-- echarts js -->
         <script src="/assets/libs/echarts/echarts.min.js"></script>
         <!-- echarts init -->
         <script src="/assets/js/pages/echarts.init.js"></script>

         <script src="/assets/js/app.js"></script>


    </body>


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Feb 2021 17:18:24 GMT -->
</html>
