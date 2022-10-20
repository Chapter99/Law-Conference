<!DOCTYPE html>
<html>
<head>
    @include('reviewers.includes.head_style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    @include('reviewers.includes.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('reviewers.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: 60px">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    @include('reviewers.includes.footer')

</div>
<!-- ./wrapper -->

@include('reviewers.includes.foot_script')
</body>
</html>
