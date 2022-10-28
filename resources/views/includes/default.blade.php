<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->    
    @include('includes.essentialmeta')
    <!-- Import CSS -->
    @include('includes.essentialcss')
  </head>
  <body>
    <!--Topbar -->
    <div class="topbar transition">
      <!-- Header  -->
      @include('includes.header')
      <!--Sidebar-->
      @include('includes.sidebar')
    </div>
    <!-- End Sidebar-->
    <div class="sidebar-overlay"></div>
    <!-- Content -->
    @yield('content')
    <!-- Footer -->
    @include('includes.footer')
    <!-- Loader -->
    @include('includes.loader')
    <!-- Import JS -->
    @include('includes.essentialjs')

  </body>
</html>

