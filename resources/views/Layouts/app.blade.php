<!DOCTYPE html>
<html lang="en">
{{-- header start --}}
@include('Layouts.includes.header')
{{-- header end --}}

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div> --}}

        <!-- Navbar -->
        @include('Layouts.includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        @include('Layouts.includes.sidebar')
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        @include('Layouts.includes.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('Layouts.includes.script')

</body>

</html>
