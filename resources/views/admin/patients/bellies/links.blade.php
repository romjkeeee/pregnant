<li @if (request()->is('*patients/bellies*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Замеры живота</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.patients.bellies.index') class="active" @endif>
            <a href="{{ route('admin.patients.bellies.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.patients.bellies.create') class="active" @endif>
            <a href="{{ route('admin.patients.bellies.create') }}">Добавить</a>
        </li>
    </ul>
</li>
