<!-- Navbar Vertical -->
<aside
    class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <div class="navbar-brand-wrapper justify-content-between">
                <!-- Logo -->

                <a class="navbar-brand" href="#" aria-label="Front">
                    <h1 class="navbar-brand-logo"><b>AKSENS</b></h1>
                    <h1 class="navbar-brand-logo-mini"><b>A</b></h1>
                </a>

                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button"
                        class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                    <i class="tio-clear tio-lg"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <!-- Role Admin -->
            @role('admin')
            <!-- Content -->
            <div class="navbar-vertical-content">
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->
                    <li class="nav-item {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'dashboard') ? 'active' : ''}}">
                        <a class="js-nav-tooltip-link nav-link " href="{{route('admin.index')}}" title="Dashboard"
                           data-placement="left">
                            <i class="tio-dashboard-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
                        </a>
                    </li>
                    <!-- End Dashboards -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="Halaman">Halaman</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'pretest') ? 'active' : ''}}" href="{{route('result.student.pretest.index')}}" title="Hasil Pre Test Siswa"
                           data-placement="left">
                            <i class="tio-file-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Hasil Pre Test Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'pretest') ? 'active' : ''}}" href="{{route('result.student.posttest.index')}}" title="Hasil Post Test Siswa"
                           data-placement="left">
                            <i class="tio-file-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Hasil Post Test Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'pretest') ? 'active' : ''}}" href="{{route('pretest.index')}}" title="Hasil Pre Test Siswa"
                           data-placement="left">
                            <i class="tio-file-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pre Test Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'posttest') ? 'active' : ''}}" href="{{route('posttest.index')}}" title="Hasil Pre Test Siswa"
                           data-placement="left">
                            <i class="tio-file-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Post Test Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'student') ? 'active' : ''}}" href="{{route('student.index')}}" title="List Siswa"
                           data-placement="left">
                            <i class="tio-user-add nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">List Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'teacher') ? 'active' : ''}}" href="{{route('admin.teacher')}}" title="List Guru"
                           data-placement="left">
                            <i class="tio-user-add nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">List Guru</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'article') ? 'active' : ''}}" href="{{route('article.index')}}" title="Buat Artikel"
                           data-placement="left">
                            <i class="tio-edit nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Buat Artikel</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'forum') ? 'active' : ''}}" href="{{route('forum.index')}}" title="Buat Forum"
                           data-placement="left">
                            <i class="tio-chat-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Buat Forum</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'pretest') ? 'active' : ''}}" href="{{route('banner.index')}}" title="Edit Banner"
                           data-placement="left">
                            <i class="tio-column-view nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Edit Banner</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'setting') && (Request::segment(3) == 'chat') ? 'active' : ''}}" href="{{route('chatautomatic.index')}}" title="Pengaturan Chat"
                           data-placement="left">
                            <i class="tio-chat-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pengaturan Chat</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Content -->
            @endrole
            <!-- End Role Admin -->

            <!-- Role Guru -->
            @role('guru')
            <!-- Content -->
            <div class="navbar-vertical-content">
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->
                    <li class="nav-item {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'dashboard') ? 'active' : ''}}">
                        <a class="js-nav-tooltip-link nav-link " href="{{route('guru.index')}}" title="Dashboard"
                           data-placement="left">
                            <i class="tio-dashboard-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
                        </a>
                    </li>
                    <!-- End Dashboards -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="Halaman">Halaman</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'guru') && (Request::segment(2) == 'profile') ? 'active' : ''}}" href="{{route('guru.profile')}}" title="Profile"
                           data-placement="left">
                            <i class="tio-user-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Profile</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'pretest') ? 'active' : ''}}" href="{{route('result.student.pretest.index')}}" title="Hasil Pre Test Siswa"
                           data-placement="left">
                            <i class="tio-file-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Hasil Pre Test Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'pretest') ? 'active' : ''}}" href="{{route('result.student.posttest.index')}}" title="Hasil Pre Test Siswa"
                           data-placement="left">
                            <i class="tio-file-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Hasil Post Test Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'student') ? 'active' : ''}}" href="{{route('student.index')}}" title="Daftarkan Siswa"
                           data-placement="left">
                            <i class="tio-user-add nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Daftarkan Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'article') ? 'active' : ''}}" href="{{route('article.index')}}" title="Buat Artikel"
                           data-placement="left">
                            <i class="tio-edit nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Buat Artikel</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'forum') ? 'active' : ''}}" href="{{route('forum.index')}}" title="Buat Forum"
                           data-placement="left">
                            <i class="tio-chat-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Buat Forum</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'pretest') ? 'active' : ''}}" href="{{route('banner.index')}}" title="Edit Banner"
                           data-placement="left">
                            <i class="tio-column-view nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Edit Banner</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link" href="{{route('chat')}}" title="Chat"
                           data-placement="left">
                            <i class="tio-chat-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Chat</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Content -->
            @endrole
            <!-- End Role Guru -->

            <!-- Role Siswa -->
            @role('siswa')
            <!-- Content -->
            <div class="navbar-vertical-content">
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->
                    <li class="nav-item {{(Request::segment(1) == 'siswa') && (Request::segment(2) == 'dashboard') ? 'active' : ''}}">
                        <a class="js-nav-tooltip-link nav-link " href="{{route('siswa.index')}}" title="Dashboard"
                           data-placement="left">
                            <i class="tio-dashboard-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
                        </a>
                    </li>
                    <!-- End Dashboards -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="Halaman">Halaman</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'siswa') && (Request::segment(2) == 'profile') ? 'active' : ''}}" href="{{route('siswa.profile')}}" title="Profile"
                           data-placement="left">
                            <i class="tio-user-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Profile</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'pretest') ? 'active' : ''}}" href="{{route('siswa.pretest')}}" title="Pre Test Siswa"
                           data-placement="left">
                            <i class="tio-file-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pre Test Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'admin') && (Request::segment(2) == 'posttest') ? 'active' : ''}}" href="{{route('siswa.posttest')}}" title="Post Test Siswa"
                           data-placement="left">
                            <i class="tio-file-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Post Test Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{(Request::segment(1) == 'forum') ? 'active' : ''}}" href="{{route('forum.index')}}" title="Buat Forum"
                           data-placement="left">
                            <i class="tio-chat-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Buat Forum</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link" href="{{route('chat')}}" title="Chat"
                           data-placement="left">
                            <i class="tio-chat-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Chat</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Content -->
            @endrole
            <!-- End Role Siswa -->

        </div>
    </div>
</aside>
<!-- End Navbar Vertical -->
