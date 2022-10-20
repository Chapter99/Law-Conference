<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/images/tsu_logo.png') }}" alt="TSU Logo"
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Law Conference</span>
    </a>

    <!-- Sidebar -->
    {{-- <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle
    elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Samit Koyom</a>
    </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            {{-- <li class="nav-item">
                <a href="{{ url('backend/dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
            </li> --}}

            <li class="nav-item">
                <a href="{{ url('backend/home') }}" class="nav-link {{ (request()->segment(2)=='home')?'active':'' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        หน้าหลัก
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('backend/presentlist') }}"
                    class="nav-link {{ (request()->segment(2)=='presentlist')?'active':'' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        รายชื่อผู้ลงทะเบียน
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('backend/paperlist') }}" class="nav-link {{ (request()->segment(2)=='paperlist')?'active':'' }}">
                    <i class="nav-icon fas fa-paper-plane"></i>
                    <p>
                        รายการผลงาน
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('backend/reviewers') }}" class="nav-link {{ (request()->segment(2)=='reviewers')?'active':'' }}">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>
                        ผู้ทรงคุณวุฒิ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('backend/paymentlist') }}" class="nav-link {{ (request()->segment(2)=='paymentlist')?'active':'' }}">
                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                    <p>
                        การชำระเงิน
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item has-treeview {{ (request()->segment(2)=='products')?'menu-open':'' }}
            {{ (request()->segment(2)=='categories')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-check-circle"></i>
                <p>
                    ผู้เข้าร่วมกิจกรรม
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('backend/products') }}"
                        class="nav-link {{ (request()->segment(2)=='products')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>ลงทะเบียนล่วงหน้า</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('backend/categories') }}"
                        class="nav-link {{ (request()->segment(2)=='categories')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>แยกตามสาขา/ปีการศึกษา</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{url('backend/orders')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>รายบุคคล</p>
                    </a>
                </li>
            </ul>
            </li> --}}


            <li class="nav-header">
                <hr>
            </li>

            {{-- <li class="nav-item">
            <a href="#"  class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li> --}}
            <form action="{{ route('logout') }}" id="frm_logout" method="post">
                @csrf
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('frm_logout').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            ออกจากระบบ
                        </p>
                    </a>
                </li>
            </form>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
