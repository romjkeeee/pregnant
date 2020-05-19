<li @if (request()->is('*article-category*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Категории статей</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.article-category.index') class="active" @endif><a href="{{ route('admin.article-category.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.article-category.create') class="active" @endif><a href="{{ route('admin.article-category.create') }}">Добавить</a></li>
    </ul>
</li>
