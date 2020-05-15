<li @if (request()->is('*articles*') || request()->is('*article-category*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-list"></i>
        <span class="nav-label">Статьи</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.articles.index') class="active" @endif><a href="{{ route('admin.articles.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.articles.create') class="active" @endif><a href="{{ route('admin.articles.create') }}">Добавить</a></li>
        @include('admin.article-category.links')
    </ul>
</li>
