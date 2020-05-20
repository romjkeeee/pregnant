<li @if (request()->is('*patients/weights*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Измерения веса</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.patients.weights.index') class="active" @endif>
            <a href="{{ route('admin.patients.weights.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.patients.weights.create') class="active" @endif>
            <a href="{{ route('admin.patients.weights.create') }}">Добавить</a>
        </li>
    </ul>
</li>
