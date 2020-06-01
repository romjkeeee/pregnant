<li @if (request()->is('*languages*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-globe"></i>
        <span class="nav-label">Языки</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.languages.index') class="active" @endif><a href="{{ route('admin.languages.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.languages.create') class="active" @endif><a href="{{ route('admin.languages.create') }}">Добавить</a></li>
    </ul>
</li>
