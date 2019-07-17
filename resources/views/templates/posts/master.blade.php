@include('templates.posts.header')
@include('templates.posts.leftbar')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
@include('templates.posts.footer')
