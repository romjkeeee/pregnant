@extends('layouts.admin.main')

@section('content')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="javascript:void(0);" class="logout_do">
                            <i class="fa fa-sign-out"></i> Выйти
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading" style="margin-bottom: 20px">
            <div class="col-lg-8">
                <h2>{{ $page_title }}</h2>
                @yield('breadcrumbs')
            </div>
            <div class="col-lg-4 text-right">
                @yield('header-btn')
            </div>
        </div>
        <div class="col-lg-12">
            @include('layouts.admin.blocks.notification')
        </div>
        <div class="col-lg-12">
            <form method="POST" action="@yield('form-action')" enctype="multipart/form-data">@csrf
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Общая информация</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">@yield('fields')</div>
                    <div class="ibox-footer">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
        @include('layouts.admin.blocks.footer')
    </div>
@endsection
