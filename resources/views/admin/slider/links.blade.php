<li @if (request()->is('*slider*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-file-photo-o"></i>
        <span class="nav-label">Слайдер</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.slider.index') class="active" @endif><a href="{{ route('admin.slider.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.slider.create') class="active" @endif><a href="{{ route('admin.slider.create') }}">Добавить</a></li>
    </ul>
</li>
