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
                <h2>Врач {{ $rec->last_name }} {{ $rec->name }} {{ $rec->second_name }}</h2>
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-danger">{{ session('success') }}</div>
                @endif
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin_dashboard') }}">Панель администратора</a>
                    </li>
                    <li>
                        <a href="{{ route('admin_med') }}">Врачи</a>
                    </li>
                    <li class="active">
                        <strong>Врач {{ $rec->last_name }} {{ $rec->name }} {{ $rec->second_name }}</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2 text-right">
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <form action="" method="GET">
                <div class="row">
					@if ($rec->photo)
						<div class="col-lg-12">
							<a href="/{{ $rec->photo }}">
								<img src="/{{ $rec->photo }}" style="max-height: 200px; width: auto;">
							</a>
							<br /><br />
						</div>
					@endif
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
										<td>Специализации</td>
										<td>{!! $rec->spec !!}</td>
									</tr>
									<tr>
										<td>Клиники</td>
										<td>{!! $rec->clin !!}</td>
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
						<a href="{{ route('admin_med_add') }}" class="btn btn-success">Добавить врача</a>
                        <a href="{{ route('admin_med_edit', $rec->id) }}" class="btn btn-primary">Обновить врача</a>
                        <a href="/admin/delete_record/med/{{ $rec->id }}" class="btn btn-danger">Удалить</a>
                        <br/><br/>
                    </div>
					<div class="col-lg-12">
						<div class="ibox">
							<div class="ibox-content">
								<h3>Отзывы</h3>
								<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
									<thead>
									<tr>
										<th data-toggle="true">#</th>
										<th data-toggle="true">Пациент</th>
										<th data-toggle="true">Оценка</th>
										<th data-toggle="true">Комментарий</th>
										<th data-toggle="true">Дата отзыва</th>
									</tr>
									</thead>
									<tbody>
										@if ($reviews->count())
											@foreach ($reviews as $rev)
												<tr>
													<td class="footable-visible">{{ $rev->id }}</td>
													<td class="footable-visible">{!! $rev->patient !!}</td>
													<td class="footable-visible">{{ $rev->rate }}</td>
													<td class="footable-visible">{{ $rev->text }}</td>
													<td class="footable-visible">{{ date('d.m.Y - H:i', strtotime($rev->created_at)) }}</td>
												</tr>
											@endforeach
										@else
											<tr>
												<td class="footable-odd" colspan="4">Нет данных</td>
											</tr>
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
