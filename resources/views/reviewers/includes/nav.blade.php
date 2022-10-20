<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
   
      <li class="nav-item mt-2"><span class="text-secondary">ผู้ทรงคุณวุฒิ : </span> <span class="text-primary">{{ Auth::guard('reviewer')->user()->title.Auth::guard('reviewer')->user()->fname." ".Auth::guard('reviewer')->user()->lname }}</span></li>
      <!-- Profile Dropdown Menu -->
      

    </ul>
  </nav>
