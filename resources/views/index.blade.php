<!DOCTYPE html><html lang="en">
@include('partials.head')
<body>
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
   @include('partials.topbar')
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    @include('partials.sidebar')
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
        @yield('content')
        <!-- content -->
        </div>
        <footer class="footer">© 2020 Pemkab Brebes <span class="d-none d-sm-inline-block">- WebInformationBrebesFlood <i class="mdi mdi-heart text-danger"></i></span>.</footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== --></div>
<!-- END wrapper -->
<!-- jQuery  -->
@include('partials.scripts')
</body>
</html>