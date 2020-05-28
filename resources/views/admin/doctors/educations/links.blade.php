<li @if (request()->is('*doctors/educations*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Образование</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.doctors.educations.index') class="active" @endif>
            <a href="{{ route('admin.doctors.educations.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.doctors.educations.create') class="active" @endif>
            <a href="{{ route('admin.doctors.educations.create') }}">Добавить</a>
        </li>
    </ul>
</li>
