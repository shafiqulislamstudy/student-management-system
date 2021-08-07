<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('admin.dashboard')}}" class="brand-link">
    <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Student Management</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Course
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('course.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Course</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('course.show')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Course</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Student
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('student.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Student</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('student.show')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Student</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-dollar-sign"></i>
            <p>
              Fees
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('payment.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add payment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('payment.show')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View payment</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('payment.report')}}" class="nav-link">
            <i class="nav-icon fas fa-file-medical-alt"></i>
            <p>Payment Report</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>