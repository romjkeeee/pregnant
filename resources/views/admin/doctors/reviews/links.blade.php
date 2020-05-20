<li @if (request()->is('*doctors/reviews*')) class="active" @endif>
    <a href="#" style="margin-left: -2px">
        <span class="nav-label">Отзывы</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" style="margin-left: 15px">
        <li @if (Route::current()->getName() == 'admin.doctors.reviews.index') class="active" @endif>
            <a href="{{ route('admin.doctors.reviews.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.doctors.reviews.create') class="active" @endif>
            <a href="{{ route('admin.doctors.reviews.create') }}">Добавить</a>
        </li>
    </ul>
</li>
