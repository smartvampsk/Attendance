<ul class="sidebar navbar-nav" id="sidebar" data-widget="tree">
    <li class="nav-item">    
        <a class="navbar-brand text-white" href="home">
            <h2><i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </li>
    
    <?php if (isset($_SESSION['logged_admin_type'])) { 
        if ($_SESSION['logged_admin_type'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item dropright">
                <a type="button" class="pl-0 btn dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Admins</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="register_admin"><i class="fas fa-fw fa-user-plus"></i> Register</a>
                    <a class="dropdown-item" href="view_admin"><i class="fas fa-fw fa-eye"></i> View</a>
                </div>
            </li>

            <li class="nav-item dropright">
                <a type="button" class="pl-0 btn dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Employee</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="register_employee"><i class="fas fa-fw fa-plus-square"></i> Register</a>
                    <a class="dropdown-item" href="view_employee"><i class="fas fa-fw fa-eye"></i> View</a>
                </div>
            </li>
            <li class="nav-item dropright">
                <a type="button" class="pl-0 btn dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Department</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="add_department"><i class="fas fa-fw fa-plus-square"></i> Add</a>
                    <a class="dropdown-item" href="view_department"><i class="fas fa-fw fa-eye"></i> View</a>
                </div>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="view_admin">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>View Admins</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="view_employee">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>View Employees</span>
                </a>
            </li>
        <?php } 
    } ?>

    <li class="nav-item dropright">
        <a type="button" class="pl-0 btn dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Attendance</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="emp_attend"><i class="fas fa-fw fa-eye"></i>Employee</a>
            <a class="dropdown-item" href="ind_attend"><i class="fas fa-fw fa-plus-square"></i>Individuals</a>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link text-white" href="archive">
            <i class="fas fa-fw fa-file-archive"></i>
            <span>Archived</span>
        </a>
    </li>

    <li class="nav-item dropright">
        <a type="button" class="pl-0 btn dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Pay slip</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="salaries"><i class="fas fa-fw fa-eye"></i> Records</a>
            <a class="dropdown-item" href="salary_add"><i class="fas fa-fw fa-plus-square"></i> Create New</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link text-white" href="leave">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Leave Requests</span>
        </a>
    </li>

    <li class="nav-item dropright">
        <a type="button" class="pl-0 btn dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span> Holiday </span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="viewHoliday"><i class="fas fa-fw fa-eye"></i> View </a>
            <a class="dropdown-item" href="addHoliday"><i class="fas fa-fw fa-plus-square"></i> Add </a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link text-white" href="logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>