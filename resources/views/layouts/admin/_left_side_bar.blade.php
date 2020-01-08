<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset(auth()->user()->image) }}" width="30%" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->role }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item " href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="{{ route('user.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Admins</span></a></li>
        <li><a class="app-menu__item " href="{{ route('admin.subject.index') }}"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Subjects</span></a></li>
        <li><a class="app-menu__item " href="{{ route('admin.teacher.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Teachers</span></a></li>
        <li><a class="app-menu__item " href="{{ route('admin.student.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Students</span></a></li>
    </ul>
</aside>
