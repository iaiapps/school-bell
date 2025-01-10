<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }} " href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-speedometer"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Jadwal</div>

                <a class="nav-link {{ Route::currentRouteName() == 'cluster.index' ? 'active' : '' }} "
                    href="{{ route('cluster.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-grid"></i></div>
                    Group Bell
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'file.index' ? 'active' : '' }} "
                    href="{{ route('file.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-music-note-list"></i></div>
                    File Bell
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'schedule.index' ? 'active' : '' }} "
                    href="{{ route('schedule.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-calendar-event"></i></div>
                    Jadwal Bell
                </a>


                <div class="sb-sidenav-menu-heading">Master</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="bi bi-sliders"></i></div>
                    Master
                    <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Route::currentRouteName() == 'cluster.index' ? 'active' : '' }}"
                            href="{{ route('cluster.index') }}">Master Setting</a>
                        <a class="nav-link {{ Route::currentRouteName() == 'schedule.index' ? 'active' : '' }}"
                            href="{{ route('schedule.index') }}">Master User</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
