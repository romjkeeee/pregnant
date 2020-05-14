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
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-danger">{{ session('success') }}</div>
                @endif
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
                    <div class="ibox">
                        <div class="ibox-content">
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    @yield('table-header')
                                </tr>
                                </thead>
                                <tbody>
                                @yield('table-body')
                                @empty($items)
                                    <tr>
                                        <td colspan="5">Список пуст</td>
                                    </tr>
                                @endempty
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="10">
                                        <ul class="pagination pull-right">{{ $items->links() }}</ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.admin.blocks.footer')
    </div>
@endsection
