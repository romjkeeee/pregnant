<li @if (request()->is('*clinics/schedules*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">График работы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.schedules.index') class="active" @endif><a href="{{ route('admin.schedules.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.schedules.create') class="active" @endif><a href="{{ route('admin.schedules.create') }}">Добавить</a></li>
    </ul>
</li>
