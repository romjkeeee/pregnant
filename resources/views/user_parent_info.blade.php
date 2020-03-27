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
                        <a href="javascript:void(0);" class="logout_do">
                            <i class="fa fa-sign-out"></i> Выйти
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Родитель {{ $rec->last_name }} {{ $rec->name }} {{ $rec->second_name }}</h2>
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-danger">{{ session('success') }}</div>
                @endif
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/users/parents">Панель администратора</a>
                    </li>
                    <li>
                        <a href="/admin/users/parents">Пользователи</a>
                    </li>
                    <li class="active">
                        <strong>Родитель {{ $rec->last_name }} {{ $rec->name }} {{ $rec->second_name }}</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2 text-right">
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-content">
                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
									<tr>
										<td>ID в БД</td>
										<td>{{ $rec->id }}</td>
									</tr>
                                    <tr>
                                        <td>Фамилия</td>
                                        <td>{{ $rec->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Имя</td>
                                        <td>{{ $rec->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Отчество</td>
                                        <td>{{ $rec->second_name }}</td>
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
										<td>Город</td>
										<td>{{ $rec->city }}</td>
									</tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>
                                            <a href="mailto:{{ $rec->email }}">{{ $rec->email }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Телефон</td>
                                        <td>{{ $rec->phone }}</td>
                                    </tr>
									<tr>
										<td>Дата регистрации</td>
										<td>{{ date('d.m.Y - H:i', strtotime($rec->created_at)) }}</td>
									</tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
						<a href="/admin/users/parents/add" class="btn btn-success">Добавить родителя</a>
                        <a href="/admin/users/parents/edit/{{ $rec->id }}" class="btn btn-primary">Изменить родителя</a>
                        <a href="/admin/delete_record/users/{{ $rec->id }}" class="btn btn-danger">Удалить</a>
                        <br/><br/>
                    </div>
					<div class="col-lg-12">
						<div class="ibox">
							<div class="ibox-content">
								<h3>Дети</h3>
								<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
									<thead>
									<tr>
										<th data-toggle="true">#</th>
										<th data-toggle="true">ФИО</th>
										<th data-toggle="true">Дата рождения</th>
										<th data-toggle="true">Команда</th>
										<th data-toggle="true">Разборов</th>
									</tr>
									</thead>
									<tbody>
										@if ($list->count())
											@foreach ($list as $key => $record)
												<tr class="footable-odd">
													<td class="footable-visible">{{ $record->id }}</td>		
													<td class="footable-visible"><a href="/admin/users/childs/info/{{ $record->id }}">{{ $record->last_name }} {{ $record->name }} {{ $record->second_name }}</a></td>
													<td class="footable-visible">{{ date('d.m.Y', strtotime($record->date_of_birth)) }}</td>
													<td class="footable-visible">
														@if ($record->team_id)
															<a href="/admin/teams/info/{{ $record->team_id }}">{{ $record->team }}</a>
														@else
															{{ $record->team }}
														@endif
													</td>
													<td class="footable-visible">0</td>
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
