<li @if (request()->is('*cities*')) class="active" @endif>
    <a href="#">
        <span class="nav-label">Города</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.cities.index') class="active" @endif><a href="{{ route('admin.cities.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.cities.create') class="active" @endif><a href="{{ route('admin.cities.create') }}">Добавить</a></li>
    </ul>
</li>
