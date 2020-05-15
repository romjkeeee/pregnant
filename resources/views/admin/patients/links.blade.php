<li @if (request()->is('*patients*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-user-plus"></i>
        <span class="nav-label">Пациенты</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.patients.index') class="active" @endif><a href="{{ route('admin.patients.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.patients.create') class="active" @endif><a href="{{ route('admin.patients.create') }}">Добавить</a></li>
    </ul>
</li>
