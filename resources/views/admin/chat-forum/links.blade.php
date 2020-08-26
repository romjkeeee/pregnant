<li @if (request()->is('*chat-forum*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Форумы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.chat-forum.index') class="active" @endif><a href="{{ route('admin.chat-forum.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.chat-forum.create') class="active" @endif><a href="{{ route('admin.chat-forum.create') }}">Добавить</a></li>

    </ul>
</li>
