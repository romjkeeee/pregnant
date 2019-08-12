@extends('layouts.admin.main')

@section('content')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="/admin/trash"><i class="fa fa-trash"></i> Корзина</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-language"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li><a href="javascript:void(0);">Русский</a></li>
                            <li><a href="javascript:void(0);">English</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="logout_do">
                            <i class="fa fa-sign-out"></i> Выйти
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Пользователь {{ $rec->name }}</h2>
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-danger">{{ session('success') }}</div>
                @endif
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/users">Панель администратора</a>
                    </li>
                    <li>
                        <a href="/admin/users">Пользователи</a>
                    </li>
                    <li class="active">
                        <strong>Пользователь {{ $rec->name }}</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2 text-right">
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <form action="{{ route('admin_cats') }}" method="GET">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-content">
                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                    <tr>
                                        <td>ФИО пользователя</td>
                                        <td>{{ $rec->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>
                                            <a href="mailto:{{ $rec->email }}">{{ $rec->email }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Страна</td>
                                        <td>{{ $country1 }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-content">
                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                    <tr>
                                        <td>Дата регистрации</td>
                                        <td>
                                            @if (strtotime($rec->created_at))
                                                {{ date('d.m.Y - H:i', strtotime($rec->created_at)) }}
                                            @else
                                                неизвестно
                                            @endif
                                        </td>
                                    </tr>								
                                    <tr>
                                        <td>Последний вход</td>
                                        <td>
                                            @if (strtotime($rec->logged_at))
                                                {{ date('d.m.Y - H:i', strtotime($rec->logged_at)) }}
                                            @else
                                                неизвестно
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>IP</td>
                                        <td>
                                            @if ($rec->ip)
												{{ $rec->ip }}
											@else
												неизвестно
											@endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
						<a href="/admin/users/add" class="btn btn-success">Создать пользователя</a>
                        <a href="/admin/users/edit/{{ $rec->id }}" class="btn btn-primary">Изменить пользователя</a>
                        <a href="/admin/delete_record/users/{{ $rec->id }}" class="btn btn-danger">Удалить</a>
                        <br/><br/>
                    </div>
					<div class="col-lg-12">
						<div class="ibox">
							<div class="ibox-content">
								<h3>Объявления</h3>
								<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
									<thead>
									<tr>
										<th data-toggle="true">ID</th>
										<th data-toggle="true">Категория</th>
										<th data-toggle="true">Заголовок</th>
										<th data-toggle="true">Статус</th> 
									</tr>
									</thead>
									<tbody>
										@if ($list->count())
											@foreach ($list as $key => $record)
												<tr class="footable-odd">
													<td class="footable-visible">{{ $record->id }}</td>		
													<td class="footable-visible">{!! $record->category !!}</td>
													<td class="footable-visible">{{ $record->title }}</td>
													<td class="footable-visible">
														@if ($record->status == 'vip')
															<span class="badge badge-info">VIP</span>
														@endif
														@if ($record->status == 'waiting')
															<span class="badge badge-warning">На одобрении</span>
														@endif
														@if ($record->status == 'active')
															<span class="badge badge-success">Активно</span>
														@endif
														@if ($record->status == 'expires')
															<span class="badge badge-warning">Истекает срок</span>
														@endif
														@if ($record->status == 'deleted')
															<span class="badge badge-red">Удалено</span>
														@endif													
													</td>
												</tr>
											@endforeach
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>


        </div>
        <div class="footer">
            <div class="pull-right">

            </div>
            <div>

            </div>
        </div>
    </div>
@endsection
