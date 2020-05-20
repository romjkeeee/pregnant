<li @if (request()->is('*patients/bellies*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Екстренные контакты</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.patients.emergency-contacts.index') class="active" @endif>
            <a href="{{ route('admin.patients.emergency-contacts.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.patients.emergency-contacts.create') class="active" @endif>
            <a href="{{ route('admin.patients.emergency-contacts.create') }}">Добавить</a>
        </li>
    </ul>
</li>
