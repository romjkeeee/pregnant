<li @if (request()->is('*regions*')) class="active" @endif>
    <a href="#">
        <span class="nav-label">Регионы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.regions.index') class="active" @endif><a href="{{ route('admin.regions.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.regions.create') class="active" @endif><a href="{{ route('admin.regions.create') }}">Добавить</a></li>
    </ul>
</li>
