<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white"> Dashboard</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Users</h6>
            </li>
            @if (auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard.users.index' ? ' active bg-gradient-primary' : '' }}"
                        href="{{ route('dashboard.users.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard.favorites.index' ? ' active bg-gradient-primary' : '' }}"
                    href="{{ route('dashboard.favorites.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-heart ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Favorites</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard.quizzes' ? ' active bg-gradient-primary' : '' }}"
                    href="{{ route('dashboard.quizzes') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-book ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quizzes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard.online_classes.index' ? ' active bg-gradient-primary' : '' }}"
                    href="{{ route('dashboard.online_classes.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-camera ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Online Classes</span>
                </a>
            </li>

            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('moderator'))
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Control</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  {{ Route::currentRouteName() == 'dashboard.blogs.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('dashboard.blogs.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">book</i>
                        </div>
                        <span class="nav-link-text ms-1">Blogs</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('moderator') || auth()->user()->hasRole('teacher'))
                <li class="nav-item">
                    <a class="nav-link text-white  {{ Route::currentRouteName() == 'dashboard.courses.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('dashboard.courses.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  {{ Route::currentRouteName() == 'dashboard.lessons.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('dashboard.lessons.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Lessons</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white  {{ Route::currentRouteName() == 'dashboard.comments.index' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('dashboard.comments.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">book</i>
                        </div>
                        <span class="nav-link-text ms-1">Comments</span>
                    </a>
                </li>
            @endif

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'profile.edit' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('profile.edit') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>

            @if (auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard/contact' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('dashboard.contact') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">message</i>
                        </div>
                        <span class="nav-link-text ms-1">Contact</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">

        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="{{ route('home') }}" target="_blank" type="button">Home
                Page</a>
        </div>
    </div>
</aside>
