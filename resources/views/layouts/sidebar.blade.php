<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('manager.book.room') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Demo Laravel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link"  href="{{ route('manager.book.room') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Đặt Phòng
    </div>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('book-room')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Book Room</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('manager.book.room')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Manager Book Room</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản Lý
    </div>
    <!-- Nav Item - User -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.get') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>User</span></a>
    </li>

    <!-- Nav Item - Meet Room -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('department.get') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Department</span></a>
    </li>

    <!-- Nav Item - Department -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('meetroom.get')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Meet Room</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
