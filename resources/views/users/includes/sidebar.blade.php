<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #022d55 !important">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/images/tsu_logo.png') }}" alt="TSU Logo"
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Law Conference</span>
    </a>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item">
                <a href="{{ url('users/home') }}" class="nav-link {{ (request()->segment(2) == 'home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        หน้าหลัก
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('users/papers/create') }}" class="nav-link {{ (request()->segment(2) == 'papers') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-upload"></i>
                    <p>
                        ส่งผลงาน
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('users/payment') }}" class="nav-link {{ (request()->segment(2) == 'payment') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>
                        แจ้งชำระเงิน
                    </p>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="{{ url('users/receiptData') }}" class="nav-link {{ (request()->segment(2) == 'receiptData') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-receipt"></i>
                    <p>
                        การออกใบเสร็จรับเงิน
                    </p>
                </a>
            </li> --}}

            <li class="nav-item">
                <a href="{{ url('users/profile') }}" class="nav-link {{ (request()->segment(2) == 'profile') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        ข้อมูลการลงทะเบียน
                    </p>
                </a>
            </li>



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
            <form action="{{ url('logout') }}" id="frm_logout" method="post">
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
