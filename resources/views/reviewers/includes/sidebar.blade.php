<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #022d55 !important">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/images/tsu_logo.png') }}" alt="TSU Logo"
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">SRC 13</span>
    </a>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item">
                <a href="{{ url('reviewers') }}" class="nav-link {{ (request()->segment(2) == '') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        หน้าหลัก
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('reviewerlogin.pdf_full') }}" target="_blank" class="nav-link">
                    <i class="nav-icon fas fa-sticky-note"></i>
                    <p>
                        หนังสือเชิญ
                    </p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ url('reviewers/view_pwd') }}" class="nav-link {{ (request()->segment(2) == 'view_pwd') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-key"></i>
                    <p>
                        เปลี่ยนรหัสผ่าน
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
