<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SCHOOL MMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (Auth::user()->role == 1)
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Admin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/admin/list') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Admin</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/student/list') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/parent/list') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Parent</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/teacher/list') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Teacher</p>
                                </a>
                            </li>
                        </ul>


                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Academics
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/Class/list') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Class </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/subject/list') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Subject</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/assign_subject/list') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Assign Subject</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/assign_class_teacher/list') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Assign Class Teacher</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->role == 2)
                    <li class="nav-item menu-open">
                        <a href="{{ url('teacher/dashboard') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('teacher/my_student') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My student</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('teacher/my_class_subject') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Class & Subject</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('teacher/my_account') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Accountt</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->role == 3)
                    <li class="nav-item menu-open">
                        <a href="{{ url('student/dashboard') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('student/my_account') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Accountt</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('student/my_subject') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Subject</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->role == 4)
                    <li class="nav-item menu-open">
                        <a href="{{ url('parent/dashboard') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('parent/my_son') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Son</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('parent/my_account') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Accountt</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
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
</aside>
