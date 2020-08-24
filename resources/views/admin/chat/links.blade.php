<li @if (request()->is('*chat*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-comments"></i>
        <span class="nav-label">Чаты</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.chat.index') class="active" @endif><a href="{{ route('admin.chat.index') }}">Список</a></li>
        {{--<li @if (Route::current()->getName() == 'admin.chats.create') class="active" @endif><a href="{{ route('admin.chats.create') }}">Добавить</a></li>--}}
    </ul>
</li>
