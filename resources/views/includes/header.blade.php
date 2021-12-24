<!-- ========== HEADER ========== -->
<header id="header"
        class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
    <div class="navbar-nav-wrap">
        <div class="navbar-brand-wrapper">
            <!-- Logo -->
            <a class="navbar-brand" href="/" aria-label="Front">
                {{--                <img class="navbar-brand-logo" src="{{asset('assets/svg/logos/logo.svg')}}" alt="Logo">--}}
                <img class="navbar-brand-logo-mini" src="{{asset('assets/svg/logos/logo-short.svg')}}" alt="Logo">
            </a>
            <!-- End Logo -->
        </div>

        <div class="navbar-nav-wrap-content-left">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                <i class="tio-menu-hamburger navbar-vertical-aside-toggle-short-align" data-toggle="tooltip"
                   data-placement="right" title="Collapse"></i>
                <i class="tio-menu-hamburger navbar-vertical-aside-toggle-full-align"
                   data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                   data-toggle="tooltip" data-placement="right" title="Expand"></i>
            </button>
            <!-- End Navbar Vertical Toggle -->
        </div>

        <div class="navbar-nav-wrap-content-center mr-4">
            AKSENS
        </div>

        <div class="navbar-nav-wrap-content-right">
            <!-- Navbar -->
            <ul class="navbar-nav align-items-center flex-row">
{{--                @role('siswa')--}}
{{--                <li class="nav-item close mr-3">--}}
{{--                    <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="{{route('chat')}}">--}}
{{--                        <i class="tio-chat-outlined"--}}
{{--                           data-placement="right" title="Chat"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                @endrole--}}
{{--                @role('guru')--}}
{{--                <li class="nav-item close mr-3">--}}
{{--                    <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="{{route('chat')}}">--}}
{{--                        <i class="tio-chat-outlined"--}}
{{--                           data-placement="right" title="Chat"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                @endrole--}}
                <li class="nav-item">
                    <!-- Account -->
                    <div class="hs-unfold">
                        <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;"
                           data-hs-unfold-options='{
                   "target": "#accountNavbarDropdown",
                   "type": "css-animation"
                 }'>
                            <div class="avatar avatar-sm avatar-circle">
                                <img class="avatar-img" src="{{asset(Auth::user()->foto)}}"
                                     alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                            </div>
                        </a>


                        <div id="accountNavbarDropdown"
                             class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account"
                             style="width: 20rem;">
                            <div class="dropdown-item-text">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-sm avatar-circle mr-2">
                                        <img class="avatar-img" src="{{asset(Auth::user()->foto)}}"
                                             alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <span class="card-title h5">{{Auth::user()->name}}</span>
                                        <span class="card-text">{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            @role('siswa')
                            <a class="dropdown-item" href="{{route('siswa.profile')}}">
                                <span class="text-truncate pr-2"
                                      title="Profile &amp; account">Profile &amp; account</span>
                            </a>
                            @endrole

                            @role('guru')
                            <a class="dropdown-item" href="{{route('guru.profile')}}">
                                <span class="text-truncate pr-2"
                                      title="Profile &amp; account">Profile &amp; account</span>
                            </a>
                            @endrole

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <span class="text-truncate pr-2" title="Sign out">{{ __('Sign Out') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <!-- End Account -->
                </li>

            </ul>
            <!-- End Navbar -->
        </div>
    </div>
</header>
<!-- ========== END HEADER ========== -->
