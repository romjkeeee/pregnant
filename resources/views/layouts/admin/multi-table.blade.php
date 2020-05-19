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
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>{{ $page_title }}</h2>
                @yield('breadcrumbs')
            </div>
            <div class="col-lg-4 text-right">
                @yield('header-btn')
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="row">
                <div class="col-lg-6">
                    <form class="form form-inline">
                        <div class="form-group">
                            <input type="text" name="search" value="{{ $search }}" class="form-control">
                            <button type="submit" class="btn btn-default">Поиск</button>
                        </div>
                    </form>
                    <br>
                </div>
                <div class="col-lg-12">
                    @include('layouts.admin.blocks.notification')
                </div>
                @yield('tables')
            </div>
        </div>
        @include('layouts.admin.blocks.footer')
    </div>
@endsection

