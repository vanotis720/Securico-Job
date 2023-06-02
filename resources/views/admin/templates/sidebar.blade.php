<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        {{-- <a href="{{ route('admin.home') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="assets/img/logo/logo.png">
            </div>
            <!-- <p>CT</p> -->
        </a> --}}
        <a href="{{ route('admin.home') }}" class="simple-text logo-normal">
            <div class="logo-image-big">
                <img src="assets/img/logo/logo-large.png">
            </div>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if (auth()->user()->hasRole('Admin'))
                <li
                    class="{{ Request::routeIs('admin.home') ? 'active' : (Request::routeIs('recruiter.home') ? 'active' : '') }}">
                    <a href="{{ route('admin.home') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.users') ? 'active' : '' }}">
                    <a href="{{ route('admin.users') }}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>
                <li class="{{ request()->is('dashboard/offers*') ? 'active' : '' }}">
                    <a href="{{ route('admin.offers') }}">
                        <i class="nc-icon nc-bullet-list-67"></i>
                        <p>Offres</p>
                    </a>
                </li>
            @elseif(auth()->user()->hasRole('Recruiter'))
                <li class="{{ Request::routeIs('recruiter.home') ? 'active' : '' }}">
                    <a href="{{ route('recruiter.home') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ request()->is('recrutement/offers*') ? 'active' : '' }}">
                    <a href="{{ route('recruiter.offers') }}">
                        <i class="nc-icon nc-bullet-list-67"></i>
                        <p>Offres</p>
                    </a>
                </li>
            @endif

            <li class="active-pro">
                <a href="{{ route('logout') }}">
                    <i class="nc-icon nc-button-power"></i>
                    <p>Deconnexion</p>
                </a>
            </li>
        </ul>
    </div>
</div>
