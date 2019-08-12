<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-translate-customization" content="b6703fd8b1d84044-bd4dd2611d59f8dc-g6a8fe920a18c8f60-d"></meta>
    <title>{{ $page_title }}</title>
    <link href="/adm/css/bootstrap.min.css" rel="stylesheet">
    <link href="/adm/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/adm/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/adm/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="/adm/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/adm/css/animate.css" rel="stylesheet">
    <link href="/adm/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput-revisited.css">
</head>

<body class="">
    <div id="google_translate_element"></div>
    <form id="logout_form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
								EVENTIST
							</strong>
                             </span>
                                </span>
                            </a>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
					<li @if (Route::current()->getName() == 'admin_users' or Route::current()->getName() == 'admin_uadd' or Route::current()->getName() == 'admin_uedit') class="active" @endif>
                        <a href="/admin/users"><i class="fa fa-user"></i> <span class="nav-label">Пользователи</span></a>
                    </li>
					<li @if (Route::current()->getName() == 'admin_ads' or Route::current()->getName() == 'admin_aadd' or Route::current()->getName() == 'admin_aedit') class="active" @endif>
                        <a href="/admin/ads"><i class="fa fa-list"></i> <span class="nav-label">Объявления</span></a>
                    </li>
					<li @if (Route::current()->getName() == 'admin_cats' or Route::current()->getName() == 'admin_cadd' or Route::current()->getName() == 'admin_cedit') class="active" @endif>
                        <a href="/admin/cats"><i class="fa fa-folder"></i> <span class="nav-label">Рубрики</span></a>
                    </li>
					<li @if (Route::current()->getName() == 'admin_payments') class="active" @endif>
                        <a href="/admin/payments"><i class="fa fa-money"></i> <span class="nav-label">Платежи</span></a>
                    </li>
					<li @if (Route::current()->getName() == 'admin_settings') class="active" @endif>
						<a href="/admin/settings"><i class="fa fa-cog"></i> <span class="nav-label">Настройки</span></a>
					</li>
					<li @if (Route::current()->getName() == 'admin_langs') class="active" @endif>
						<a href="/admin/langs"><i class="fa fa-flag"></i> <span class="nav-label">Языки</span></a>
					</li>					
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
    <script src="/adm/js/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="/adm/js/bootstrap.min.js"></script>
    <script src="/adm/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/adm/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/adm/js/inspinia.js"></script>
    <script src="/adm/js/plugins/pace/pace.min.js"></script>
    <script src="/adm/js/plugins/summernote/summernote.min.js"></script>
    <script src="/adm/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="/js/jquery.tagsinput-revisited.js"></script>
	<script>
		$(document).ready(function() {
			$('.code_edit').summernote();
			$('.summernote').summernote();
		});
	</script>
</body>
</html>