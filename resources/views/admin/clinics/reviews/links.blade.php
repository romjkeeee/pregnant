<li @if (request()->is('*clinics/reviews*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Отзывы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.clinics.reviews.index') class="active" @endif>
            <a href="{{ route('admin.clinics.reviews.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.clinics.reviews.create') class="active" @endif>
            <a href="{{ route('admin.clinics.reviews.create') }}">Добавить</a>
        </li>
    </ul>
</li>
