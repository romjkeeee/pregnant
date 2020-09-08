<li @if (request()->is('*doctors*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-medkit"></i>
        <span class="nav-label">Доктора</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li @if (Route::current()->getName() == 'admin.doctors.index') class="active" @endif>
            <a href="{{ route('admin.doctors.index') }}">Список</a>
        </li>
        <li @if (Route::current()->getName() == 'admin.doctors.create') class="active" @endif>
            <a href="{{ route('admin.doctors.create') }}">Добавить</a>
        </li>
        @include('admin.doctors.educations.links')
        @include('admin.doctors.reviews.links')
        @include('admin.doctors.schedules.links')
    </ul>
</li>
