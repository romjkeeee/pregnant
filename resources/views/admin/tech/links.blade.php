<li @if (request()->is('*tech*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-comments"></i>
        <span class="nav-label">Тех поддеркжка</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.tech.index') class="active" @endif><a href="{{ route('admin.tech.index') }}">Список</a></li>
    </ul>
</li>
