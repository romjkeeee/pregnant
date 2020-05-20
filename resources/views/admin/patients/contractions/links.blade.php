<li @if (request()->is('*patients/contractions*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Счетчик схваток</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.patients.contractions.index') class="active" @endif>
            <a href="{{ route('admin.patients.contractions.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.patients.contractions.create') class="active" @endif>
            <a href="{{ route('admin.patients.contractions.create') }}">Добавить</a>
        </li>
    </ul>
</li>
