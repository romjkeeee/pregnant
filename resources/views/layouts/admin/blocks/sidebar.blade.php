<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">
                <a data-toggle="dropdown" class="dropdown-toggle" href="{{ route('admin.home') }}">
                    <span class="clear">
                        <span class="block m-t-xs">
                            <strong class="font-bold">CLINIC</strong>
                        </span>
                    </span>
                </a>
            </div>
            <div class="logo-element"> CL+</div>
        </li>
        @include('admin.users.links')
        @include('admin.doctors.links')
        @include('admin.patients.links')
        @include('admin.chat.links')
        @include('admin.tech.links')
        @include('admin.slider.links')
        @include('admin.clinics.links')
        @include('admin.mybaby.links')
        @include('admin.articles.links')
        @include('admin.orders.links')
        @include('admin.check-lists.links')
        @include('admin.specialisations.links')
        @include('admin.locations.links')
        @include('admin.translates.links')
        @include('admin.langs.links')
    </ul>
</div>
