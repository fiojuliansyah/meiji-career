<div class="sidebar" id="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
        <a href="index.html" class="logo logo-normal">
            <img src="/frontend/assets/imgs/template/logo.png" alt="Logo" width="40%">
        </a>
        <a href="index.html" class="logo-small">
            <img src="/admin/assets/img/logo-small.svg" alt="Logo">
        </a>
        <a href="index.html" class="dark-logo">
            <img src="/admin/assets/img/logo-white.svg" alt="Logo">
        </a>
    </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>MAIN MENU</span></li>
                <li>
                    <ul>
                        <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">
                                <i class="ti ti-smart-home"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('departments.index') ? 'active' : '' }}">
                            <a href="{{ route('departments.index') }}">
                                <i class="ti ti-building"></i><span>Departments</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('locations.index') ? 'active' : '' }}">
                            <a href="{{ route('locations.index') }}">
                                <i class="ti ti-map-pin-check"></i><span>Locations</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('careers.index') ? 'active' : '' }}">
                            <a href="{{ route('careers.index') }}">
                                <i class="ti ti-briefcase"></i><span>Careers</span>
                            </a>
                        </li>
                    </ul>
                </li>                
                <li class="menu-title"><span>Applicant</span></li>
                <li>
                    <ul>
                        <li class="{{ Route::is('applicants.index') ? 'active' : '' }}">
                            <a href="{{ route('applicants.index') }}">
                                <i class="ti ti-users"></i><span>Applicants</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('candidates.index') ? 'active' : '' }}">
                            <a href="{{ route('candidates.index') }}">
                                <i class="ti ti-users"></i><span>Candidates</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('interviews.index') ? 'active' : '' }}">
                            <a href="{{ route('interviews.index') }}">
                                <i class="ti ti-users"></i><span>Interview</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('trainings.index') ? 'active' : '' }}">
                            <a href="{{ route('trainings.index') }}">
                                <i class="ti ti-users"></i><span>Training</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('probations.index') ? 'active' : '' }}">
                            <a href="{{ route('probations.index') }}">
                                <i class="ti ti-users"></i><span>Probation</span>
                            </a>
                        </li>
                    </ul>
                </li>  
            </ul>
        </div>
    </div>
</div>