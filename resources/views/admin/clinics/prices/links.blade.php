<li @if (request()->is('*clinics/prices*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Цены</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.prices.index') class="active" @endif><a href="{{ route('admin.prices.index') }}">Список</a></li>
        <li @if (Route::current()->getName() == 'admin.prices.create') class="active" @endif><a href="{{ route('admin.prices.create') }}">Добавить</a></li>
    </ul>
</li>
