<li @if (request()->is('*mybaby*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-newspaper-o"></i>
        <span class="nav-label">Мой малыш</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.mybaby.index') class="active" @endif><a href="{{ route('admin.mybaby.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.mybaby.create') class="active" @endif><a href="{{ route('admin.mybaby.create') }}">Добавить</a></li>
    </ul>
</li>
