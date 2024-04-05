<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <hr>
                <h5 style="margin-left: 2em"><strong> Manage Mazao </strong></h5>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('beizamazao.create') }}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Add Bei za Mazao</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('mazao.create') }}"
                        aria-expanded="false">
                        <i class=" fas fa-clipboard-list" aria-hidden="true"></i>
                        <span class="hide-menu">Add Mazao</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('mazao.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span class="hide-menu">View Mazao</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('beizamazao.index') }}"
                        aria-expanded="false">
                        <i class=" fas fa-sun" aria-hidden="true"></i>
                        <span class="hide-menu">View bei za Mazao</span>
                    </a>
                </li>
                <hr>
                <h5 style="margin-left: 2em"><strong> Manage Users </strong></h5>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users.create')}}" aria-expanded="false">
                        <i class="fa fa-font" aria-hidden="true"></i>
                        <span class="hide-menu">Register User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users.index')}}" aria-expanded="false">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <span class="hide-menu">View Users</span>
                    </a>
                </li>
                <hr>
                <h5 style="margin-left: 2em"><strong> Manage Profile  </strong></h5>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <span class="hide-menu">View Your Profile</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="sidebar-link waves-effect waves-dark sidebar-link btn btn-link"
                            aria-expanded="false">
                            <i class="mdi mdi-logout me-2 text-primary"></i>
                            <span class="hide-menu">Signout</span>
                        </button>
                    </form>
                </li>

            </ul>

        </nav>
    </div>
</aside>
