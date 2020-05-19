<li @if (request()->is('*cities*') || request()->is('*regions*')) class="active" @endif>
    <a href="#">
        <i class="fa fa-globe"></i>
        <span class="nav-label">Локации</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        @include('admin.locations.regions.links')
        @include('admin.locations.cities.links')
    </ul>
</li>
