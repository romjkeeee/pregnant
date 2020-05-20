<li @if (request()->is('*specialisations*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-stethoscope"></i>
        <span class="nav-label">Специализации</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.specialisations.index') class="active" @endif>
            <a href="{{ route('admin.specialisations.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.specialisations.create') class="active" @endif>
            <a href="{{ route('admin.specialisations.create') }}">Добавить</a>
        </li>
    </ul>
</li>
