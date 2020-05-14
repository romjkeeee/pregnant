<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
								CLINIC
							</strong>
                             </span>
                                </span>
                </a>
            </div>
            <div class="logo-element">
                CL+
            </div>
        </li>

        @include('admin.users.links')

        <li @if (Route::current()->getName() == 'admin_med' or Route::current()->getName() == 'admin_med_add' or Route::current()->getName() == 'admin_med_edit' or Route::current()->getName() == 'admin_med_info') class="active" @endif>
            <a href="{{ route('admin_med') }}"><i class="fa fa-user"></i> <span class="nav-label">Врачи</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_med') class="active" @endif><a href="{{ route('admin_med') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_med_add' or Route::current()->getName() == 'admin_med_edit') class="active" @endif><a href="{{ route('admin_med_add') }}">Добавить врача</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_spec' or Route::current()->getName() == 'admin_spec_add' or Route::current()->getName() == 'admin_spec_edit') class="active" @endif>
            <a href="{{ route('admin_spec') }}"><i class="fa fa-database"></i> <span class="nav-label">Специализации</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_spec') class="active" @endif><a href="{{ route('admin_spec') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_spec_add' or Route::current()->getName() == 'admin_spec_edit') class="active" @endif><a href="{{ route('admin_spec_add') }}">Добавить специализацию</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_clinic' or Route::current()->getName() == 'admin_clinic_add' or Route::current()->getName() == 'admin_clinic_edit' or Route::current()->getName() == 'admin_clinic_info') class="active" @endif>
            <a href="{{ route('admin_clinic') }}"><i class="fa fa-home"></i> <span class="nav-label">Клиники</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_clinic') class="active" @endif><a href="{{ route('admin_clinic') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_clinic_add' or Route::current()->getName() == 'admin_clinic_edit') class="active" @endif><a href="{{ route('admin_clinic_add') }}">Добавить клинику</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_patient' or Route::current()->getName() == 'admin_patient_add' or Route::current()->getName() == 'admin_patient_edit' or Route::current()->getName() == 'admin_patient_info') class="active" @endif>
            <a href="{{ route('admin_patient') }}"><i class="fa fa-users"></i> <span class="nav-label">Пациенты</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_patient') class="active" @endif><a href="{{ route('admin_patient') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_patient_add' or Route::current()->getName() == 'admin_patient_edit') class="active" @endif><a href="{{ route('admin_patient_add') }}">Добавить пациента</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_reviews' or Route::current()->getName() == 'admin_reviews_add' or Route::current()->getName() == 'admin_reviews_edit') class="active" @endif>
            <a href="{{ route('admin_reviews') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Отзывы</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_reviews') class="active" @endif><a href="{{ route('admin_reviews') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_reviews_add' or Route::current()->getName() == 'admin_reviews_edit') class="active" @endif><a href="{{ route('admin_reviews_add') }}">Добавить отзыв</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_dur' or Route::current()->getName() == 'admin_dur_add' or Route::current()->getName() == 'admin_dur_edit') class="active" @endif>
            <a href="{{ route('admin_dur') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Недели</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_dur') class="active" @endif><a href="{{ route('admin_dur') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_dur_add' or Route::current()->getName() == 'admin_dur_edit') class="active" @endif><a href="{{ route('admin_dur_add') }}">Добавить неделю</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_regions' or Route::current()->getName() == 'admin_regions_add' or Route::current()->getName() == 'admin_regions_edit') class="active" @endif>
            <a href="{{ route('admin_regions') }}"><i class="fa fa-flag"></i> <span class="nav-label">Регионы</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_regions') class="active" @endif><a href="{{ route('admin_regions') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_regions_add' or Route::current()->getName() == 'admin_regions_edit') class="active" @endif><a href="{{ route('admin_regions_add') }}">Добавить регион</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_cities' or Route::current()->getName() == 'admin_cities_add' or Route::current()->getName() == 'admin_cities_edit') class="active" @endif>
            <a href="{{ route('admin_cities') }}"><i class="fa fa-flag"></i> <span class="nav-label">Города</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_cities') class="active" @endif><a href="{{ route('admin_cities') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_cities_add' or Route::current()->getName() == 'admin_cities_edit') class="active" @endif><a href="{{ route('admin_cities_add') }}">Добавить город</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_news' or Route::current()->getName() == 'admin_news_add' or Route::current()->getName() == 'admin_news_edit') class="active" @endif>
            <a href="{{ route('admin_news') }}"><i class="fa fa-list"></i> <span class="nav-label">Новости</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_news') class="active" @endif><a href="{{ route('admin_news') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_news_add' or Route::current()->getName() == 'admin_news_edit') class="active" @endif><a href="{{ route('admin_news_add') }}">Добавить новость</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_arts' or Route::current()->getName() == 'admin_arts_add' or Route::current()->getName() == 'admin_arts_edit') class="active" @endif>
            <a href="{{ route('admin_arts') }}"><i class="fa fa-list"></i> <span class="nav-label">Статьи</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_arts') class="active" @endif><a href="{{ route('admin_arts') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_arts_add' or Route::current()->getName() == 'admin_arts_edit') class="active" @endif><a href="{{ route('admin_arts_add') }}">Добавить статью</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_recs' or Route::current()->getName() == 'admin_recs_add' or Route::current()->getName() == 'admin_recs_edit') class="active" @endif>
            <a href="{{ route('admin_recs') }}"><i class="fa fa-list"></i> <span class="nav-label">Рекомендации</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_recs') class="active" @endif><a href="{{ route('admin_recs') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_recs_add' or Route::current()->getName() == 'admin_recs_edit') class="active" @endif><a href="{{ route('admin_recs_add') }}">Добавить рекомендацию</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_docs' or Route::current()->getName() == 'admin_docs_add' or Route::current()->getName() == 'admin_docs_edit') class="active" @endif>
            <a href="{{ route('admin_docs') }}"><i class="fa fa-list"></i> <span class="nav-label">Документы</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_docs') class="active" @endif><a href="{{ route('admin_docs') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_docs_add' or Route::current()->getName() == 'admin_docs_edit') class="active" @endif><a href="{{ route('admin_docs_add') }}">Добавить документ</a></li>
            </ul>
        </li>
        <li @if (Route::current()->getName() == 'admin_msg' or Route::current()->getName() == 'admin_msg_add' or Route::current()->getName() == 'admin_chat') class="active" @endif>
            <a href="{{ route('admin_msg') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Чаты</span> </a>
        </li>
        <li @if (Route::current()->getName() == 'admin_langs' or Route::current()->getName() == 'admin_langs_add' or Route::current()->getName() == 'admin_langs_edit') class="active" @endif>
            <a href="{{ route('admin_langs') }}"><i class="fa fa-flag"></i> <span class="nav-label">Языки</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li @if (Route::current()->getName() == 'admin_langs') class="active" @endif><a href="{{ route('admin_langs') }}">Список</a></li>
                <li @if (Route::current()->getName() == 'admin_langs_add' or Route::current()->getName() == 'admin_langs_edit') class="active" @endif><a href="{{ route('admin_langs_add') }}">Добавить язык</a></li>
            </ul>
        </li>
    </ul>
</div>
