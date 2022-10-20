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
   
      <li class="nav-item mt-2"><span class="text-secondary">เข้าระบบโดย : </span> <span class="text-primary">{{ Auth::user()->fname." ".Auth::user()->lname }}</span></li>
      <!-- Profile Dropdown Menu -->
      <li class="nav-item dropdown user user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{ asset('assets/images/no_avatar.jpg') }}" class="user-image img-circle elevation-2 alt="User Image">
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="row">
               <div class="col-md-12 text-right">
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-block btn-default btn-flat">ออกจากระบบ</button>
                </form>
              </div>
            </div>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
