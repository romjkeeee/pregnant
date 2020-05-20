<li @if (request()->is('*check-lists*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-list"></i>
        <span class="nav-label">Чек листы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.check-lists.index') class="active" @endif><a href="{{ route('admin.check-lists.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.check-lists.create') class="active" @endif><a href="{{ route('admin.check-lists.create') }}">Добавить</a></li>
        @include('admin.check-lists.tasks.links')
    </ul>
</li>
