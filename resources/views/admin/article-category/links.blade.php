<li @if (request()->is('*article-category*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-building"></i>
        <span class="nav-label">Категории статей</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.article-category.index') class="active" @endif><a href="{{ route('admin.article-category.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.article-category.create') class="active" @endif><a href="{{ route('admin.article-category.create') }}">Добавить</a></li>
    </ul>
</li>
