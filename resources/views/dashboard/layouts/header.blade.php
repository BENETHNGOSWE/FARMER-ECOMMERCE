<header class="topbar" data-navbarbg="skin5" >
    <nav class="navbar top-navbar navbar-expand-md navbar-dark" style="background-color:rgb(53, 105, 53)">
        <div class="navbar-header"  data-logobg="skin6" style="background-color:rgb(53, 105, 53)" >
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <p style="color: white">FAIR ACCESS</p>
                </b>
                <span class="logo-text">
                    <p style="color: white">MARKET</p>
                </span>
            </a>
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5" style="background-color:rgb(53, 105, 53)">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class=" in">
                    <form role="search" class="app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0">
                        <a href="" class="active">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li>
                <li>
                    <a class="profile-pic" href="#" onclick="toggleDropdown()">
                        <img src="backend/assets/plugins/images/users/varun.jpg" alt="user-img" width="36"
                            class="img-circle">
                        <span class="text-white font-medium">{{auth()->user()->name}}</span>
                    </a>
                    <div id="dropdownMenu"
                        style="display: none; position: absolute; background-color: white; z-index: 999;">
                        <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<script>
    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
    }
</script>
