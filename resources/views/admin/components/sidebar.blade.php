 <!-- Brand Logo -->
 <a href="/admin" class="brand-link">
    <span class="brand-text font-weight-light" style="font-size: 24px; ">Material Disaster</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item" >
          <a href="/admin/dashboard" class=" nav-link  {{Request::path() == 'admin' ? 'active': '';}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item" >
          <a href="/admin/product" class="nav-link {{Request::path()== 'admin/product' ?  'active' : ''}}">
            <i class="nav-icon fas fa-sharp fa-solid fa-box-archive"></i>
            <p>
              Product
            </p>
          </a>
        </li>
        <li class="nav-item" >
          <a href="/admin/user_management" class="nav-link {{Request::path()== 'admin/user_management' ?  'active' : ''}}">
            <i class="nav-icon fas fa-sharp fa-regular fa-users-gear"></i>
            <p>
              User Management
            </p>
          </a>
        </li>
        <li class="nav-item" >
          <a href="/admin/report" class="nav-link {{Request::path()== 'admin/report' ?  'active' : ''}}">
            <i class="nav-icon fas fa-sharp fa-regular fa-chart-simple"></i>
            <p>
              Report
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="logout" class="nav-link">
            <i class="nav-icon fas  fa-sharp fa-solid fa-arrow-right-to-bracket"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->