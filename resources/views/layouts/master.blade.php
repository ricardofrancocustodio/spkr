
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
@include('layouts.head')

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">

      @include('layouts.nav')

      @include('layouts.aside')

      @yield('content')

      @include('layouts.footer')

      @include('layouts.ctrlsidebar')

    </div>
    <!-- ./wrapper -->

      @include('layouts.reqscripts')

  </body>
</html>
