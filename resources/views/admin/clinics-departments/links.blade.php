<li @if (request()->is('*clinic-departments*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-building"></i>
        <span class="nav-label">Департаменты</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.clinics-departments.index') class="active" @endif><a href="{{ route('admin.clinic-departments.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.clinics-departments.create') class="active" @endif><a href="{{ route('admin.clinic-departments.create') }}">Добавить</a></li>
    </ul>
</li>
