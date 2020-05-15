<li @if (request()->is('*check-lists*') || request()->is('*check-list-tasks*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-list"></i>
        <span class="nav-label">Чек лист</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.check-lists.index') class="active" @endif><a href="{{ route('admin.check-lists.index') }}">Список групп</a></li>
        <li @if (Route::current()->getName() == 'admin.check-lists.create') class="active" @endif><a href="{{ route('admin.check-lists.create') }}">Добавить группу</a></li>
        @include('admin.check-list-tasks.links')
    </ul>
</li>
