<li @if (request()->is('*clinic-departments*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Департаменты</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px;">
        <li @if (Route::current()->getName() == 'admin.clinic-departments.index') class="active" @endif><a href="{{ route('admin.clinic-departments.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.clinic-departments.create') class="active" @endif><a href="{{ route('admin.clinic-departments.create') }}">Добавить</a></li>
    </ul>
</li>
