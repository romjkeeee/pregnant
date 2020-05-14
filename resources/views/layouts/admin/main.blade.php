<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title }}</title>
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

<script>
    $(document).ready(function () {
        function init() {
            if (!$('input[name=lng]').length) {
                return false;
            }
            $('.map_container').show();
            var lng = $('input[name=lng]').val();
            lng = parseFloat(lng);
            var lat = $('input[name=lat]').val();
            lat = parseFloat(lat);
            var myMap = new ymaps.Map("map", {
                center: [lat, lng],
                zoom: 17
            });
            var myPlacemark = new ymaps.Placemark([lat, lng], {}, {
                preset: 'islands#redIcon'
            });
            myMap.geoObjects.add(myPlacemark);
        }

        $('input[name=date_of_birth]').mask('99.99.1999');
        $('input[name=date]').mask('99.99.9999');
        $('.time_mask').mask('99:99');
        $('.rate_select a').click(function () {
            var this_stars = $(this).data('stars');
            this_stars = parseInt(this_stars);
            $('.rate_select').find('a').find('i').removeClass('fa-star').addClass('fa-star-o');
            for (var i = 0; i < this_stars; i++) {
                $('.rate_select').find('a').eq(i).find('i').removeClass('fa-star-o').addClass('fa-star');
            }
            $('input[name=rating]').val(this_stars);
        });
    });
</script>

@stack('scripts')
</body>
</html>
