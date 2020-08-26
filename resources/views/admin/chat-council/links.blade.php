<li @if (request()->is('*chat-council*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Консилиумы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.chat-council.index') class="active" @endif><a href="{{ route('admin.chat-council.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.chat-council.create') class="active" @endif><a href="{{ route('admin.chat-council.create') }}">Добавить</a></li>

    </ul>
</li>
