@auth
    @if(Auth::user()->hasRole('super-admin'))
        @include('dashboard.dashboards.Superadmin.sidebar')
    @elseif(Auth::user()->hasRole('admin'))
        @include('dashboard.dashboards.admin.sidebar')
    @elseif(Auth::user()->hasRole('mkulima'))
        @include('dashboard.dashboards.mkulima.sidebar')
    @elseif(Auth::user()->hasRole('user'))
        @include('dashboard.dashboards.user.sidebar')
    @endif
@endauth
