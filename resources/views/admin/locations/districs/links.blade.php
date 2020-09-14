<li @if (request()->is('*districs*')) class="active" @endif>
    <a href="#">
        <span class="nav-label">Районы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.districs.index') class="active" @endif><a href="{{ route('admin.districs.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.districs.create') class="active" @endif><a href="{{ route('admin.districs.create') }}">Добавить</a></li>
    </ul>
</li>
