<li @if (request()->is('*users*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-users"></i>
        <span class="nav-label">Пользователи</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.users.index') class="active" @endif><a href="{{ route('admin.users.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.users.create') class="active" @endif><a href="{{ route('admin.users.create') }}">Добавить</a></li>
    </ul>
</li>
