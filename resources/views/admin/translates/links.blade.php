<li @if (request()->is('*translates*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-language"></i>
        <span class="nav-label">Переводы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.translates.index') class="active" @endif><a href="{{ route('admin.translates.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.translates.create') class="active" @endif><a href="{{ route('admin.translates.create') }}">Добавить</a></li>
    </ul>
</li>
