<li @if (request()->is('*orders*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-user-plus"></i>
        <span class="nav-label">Приказы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.orders.index') class="active" @endif><a href="{{ route('admin.orders.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.orders.create') class="active" @endif><a href="{{ route('admin.orders.create') }}">Добавить</a></li>
    </ul>
</li>
