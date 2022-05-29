<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        <div class="input-group search-area d-lg-inline-flex d-none mr-5">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text">
                                    <i class="flaticon-381-search-2"></i>
                                </a>
                            </div>
                            <input type="text" class="form-control" placeholder="Search here">
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav header-right">

                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="/assets/#" role="button" data-toggle="dropdown">
                            <img avatar="{{ auth()->user()->name }}"  alt="{{ auth()->user()->name }}" class="rounded-circle"/>
                            <div class="header-info">
                                <span>{{ strtok(auth()->user()->name, ' ') }}</span>
                            </div>
                            <i class="fa fa-caret-down ml-3 mr-2 " aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('profile') }}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ml-2">Profile </span>
                            </a>
                            @if (auth()->user()->twoFaStatus() == 1)
                            <a href="{{ route('disable-2fa') }}" class="dropdown-item ai-icon">
                                <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield-off align-middle mr-2"><path d="M19.69 14a6.9 6.9 0 0 0 .31-2V5l-8-3-3.16 1.18"></path><path d="M4.73 4.73L4 5v7c0 6 8 10 8 10a20.29 20.29 0 0 0 5.62-4.38"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                <span class="ml-2">Disable 2fa</span>
                            </a>
                            @else
                            <a href="{{ route('show2fa') }}" class="dropdown-item ai-icon">
                                <svg class="text-success"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield align-middle mr-2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                <span class="ml-2">Enable 2fa</span>
                            </a>
                            @endif
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ml-2">Logout </span>
                                <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>

                </li>
            </ul>
        </div>
    </nav>
</div>
</div>
