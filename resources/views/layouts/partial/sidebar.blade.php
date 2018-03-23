<aside class="sidebar">
    <div class="scrollbar-inner">

        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="{{ asset('demo/img/profile-pics/8.jpg') }}" alt="">
                <div>
                    <div class="user__name">{{ Auth::user()->name }}</div>
                    <div class="user__email">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">View Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        @if(Request::is('admin/*'))
            <ul class="navigation">
                <li class="{{ Request::is('admin/dashboard') ? 'navigation__active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="zmdi zmdi-home"></i> Dashboard
                    </a>
                </li>
                <li class="{{ Request::is('admin/course*') ? 'navigation__active' : '' }}">
                    <a href="{{ route('admin.course.index') }}">
                        <i class="zmdi zmdi-apps"></i> Course
                    </a>
                </li>
            </ul>
        @elseif(Request::is('student/*'))
            <ul class="navigation">
                <li class="{{ Request::is('student/dashboard') ? 'navigation__active' : '' }}">
                    <a href="{{ route('student.dashboard') }}">
                        <i class="zmdi zmdi-home"></i> Dashboard
                    </a>
                </li>
            </ul>
        @endif

    </div>
</aside>