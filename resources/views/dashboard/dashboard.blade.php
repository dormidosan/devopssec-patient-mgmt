<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
          content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Patients Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!--link rel="stylesheet" href="{-{ asset('../assets/vendors/flatpickr/flatpickr.min.css') }}" -->
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">

    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>

    @yield('custom-css')

</head>
<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    @include('dashboard.partials.sidebar')

    <!-- start settings sidebar -->
    <!-- @-include('dashboard.partials.settings-sidebar') -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        @include('dashboard.partials.header')

        <!-- content for each page -->
        @yield('main')

        <!-- partial:partials/_footer.html -->
        @include('dashboard.partials.footer')


    </div>


</div>

<!-- core:js -->
<script src="{{ asset('assets/vendors/core/core.js')}}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<!-- script src="{-{ asset('../assets/vendors/flatpickr/flatpickr.min.js')}}"></script -->
<!-- script src="{-{ asset('../assets/vendors/apexcharts/apexcharts.min.js')}}"></script -->
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{ asset('assets/js/template.js')}}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<!-- script src="{-{ asset('../assets/js/dashboard-dark.js')}}"></script -->
<!-- End custom js for this page -->
@yield('libraries')
@yield('scripts')

</body>
</html>
