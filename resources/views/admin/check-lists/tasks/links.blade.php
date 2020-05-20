<li @if (request()->is('*check-lists/tasks*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Таски</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.check-lists.tasks.index') class="active" @endif>
            <a href="{{ route('admin.check-lists.tasks.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.check-lists.tasks.create') class="active" @endif>
            <a href="{{ route('admin.check-lists.tasks.create') }}">Добавить</a>
        </li>
    </ul>
</li>
