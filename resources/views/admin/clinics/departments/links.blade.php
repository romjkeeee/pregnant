<li @if (request()->is('*clinics/departments*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Отделения</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px;">
        <li @if (Route::current()->getName() == 'admin.clinics.departments.index') class="active" @endif>
            <a href="{{ route('admin.clinics.departments.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.clinics.departments.create') class="active" @endif>
            <a href="{{ route('admin.clinics.departments.create') }}">Добавить</a>
        </li>
    </ul>
</li>
