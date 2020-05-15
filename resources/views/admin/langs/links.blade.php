<li @if (request()->is('*langs*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-building"></i>
        <span class="nav-label">Языки</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.langs.index') class="active" @endif><a href="{{ route('admin.langs.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.langs.create') class="active" @endif><a href="{{ route('admin.langs.create') }}">Добавить</a></li>
    </ul>
</li>
