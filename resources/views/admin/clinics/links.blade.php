<li @if (request()->is('*clinics*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-building"></i>
        <span class="nav-label">Клиники</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.clinics.index') class="active" @endif><a href="{{ route('admin.clinics.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.clinics.create') class="active" @endif><a href="{{ route('admin.clinics.create') }}">Добавить</a></li>
    </ul>
</li>
