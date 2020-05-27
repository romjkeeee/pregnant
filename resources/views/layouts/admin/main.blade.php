<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/adm/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/adm/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/adm/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('/adm/css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">
    <link href="{{ asset('/adm/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('/adm/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/adm/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.tagsinput-revisited.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/adm/css/bootstrap-datetimepicker-build.css') }}">
    <style>
        .bg-image {
            height: 100px;
            width: 100%;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .tab-pane .form-group {
            display: none !important;
        }

        .tab-pane.active .form-group {
            display: block !important;
        }
    </style>
    @stack('styles')
</head>

<body>
<form id="logout_form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        @include('layouts.admin.blocks.sidebar')
    </nav>
    @yield('content')
</div>
<script src="{{ asset('/adm/js/jquery-3.1.1.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('/adm/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/adm/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('/adm/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/adm/js/inspinia.js') }}"></script>
<script src="{{ asset('/adm/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('/adm/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/adm/js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('/adm/js/moment.min.js') }}"></script>
<script src="{{ asset('/adm/js/bootstrap-datetimepicker.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

@stack('scripts')
</body>
</html>
