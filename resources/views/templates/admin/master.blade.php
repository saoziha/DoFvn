@include('templates.admin.header')
@include('templates.admin.leftbar')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
@include('templates.admin.footer')
