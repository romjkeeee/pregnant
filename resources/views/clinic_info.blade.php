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
                <div class="col-lg-10">
                    <h2>Клиника {{ $rec->name }}</h2>
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
                            <a href="/admin/clinic">Клиники</a>
                        </li>
                        <li class="active">
                            <strong>Клиника {{ $rec->name }}</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
							<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
							<tr>
								<td>Регион</td>
								<td>{{ $rec->region }}</td>
							</tr>
							<tr>
								<td>Город</td>
								<td>{{ $rec->city }}</td>
							</tr>
							<tr>
								<td>Адрес</td>
								<td>{{ $rec->address }}</td>
							</tr>
							</table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 map_container" style="display: none;">
					@if ($rec->lng)
						<input type="hidden" name="lng" value="{{ $rec->lng }}">
						<input type="hidden" name="lat" value="{{ $rec->lat }}">
					@endif
                    <div class="ibox">
                        <div class="ibox-content">
							<div id="map" style="width: 100%; height: 300px;"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-12">
					<a href="/admin/clinic/add" class="btn btn-success">Добавить клинику</a>
					<a href="/admin/clinic/edit/{{ $rec->id }}" class="btn btn-primary">Изменить клинику</a>
					<a href="/admin/delete_record/clinic/{{ $rec->id }}" class="btn btn-danger">Удалить клинику</a>
					<br /><br />
				</div>
				<div class="col-lg-12">
					<div class="ibox">
						<div class="ibox-content">
							<h3>Врачи</h3>
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th data-toggle="true">#</th>
                                    <th data-toggle="true">ФИО</th>
									<th data-toggle="true">Специализация</th>
									<th data-toggle="true">Телефон</th>
                                    <th class="text-right" data-sort-ignore="true">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
									@if ($list->count())
										@foreach ($list as $record)
											<tr class="footable-odd">
												<td class="footable-visible">{{ $record->id }}</td>
												<td class="footable-visible"><a href="{{ route('admin_med_info', $record->id) }}">{{ $record->last_name }} {{ $record->name }} {{ $record->second_name }}</a></td>
												<td class="footable-visible">{!! $record->spec !!}</td>																		
												<td class="footable-visible"><a href="tel:{{ $record->phone }}">{{ $record->phone }}</a></td>																																																																
												<td class="text-right footable-visible footable-last-column">
													<div class="btn-group">
														<a href="{{ route('admin_med_edit', $record->id) }}" class="btn-white btn btn-xs"><i class="fa fa-pencil"></i></a>
														<a href="/admin/delete_record/med/{{ $record->id }}" class="btn-white btn btn-xs"><i class="fa fa-close"></i></a>
													</div>
												</td>
											</tr>
										@endforeach
									@else
										<tr><td colspan="5">Нет данных</td></tr>
									@endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="10">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="ibox">
						<div class="ibox-content">
							<h3>Пациенты</h3>
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th data-toggle="true">#</th>
									<th data-toggle="true">Регион</th>
									<th data-toggle="true">Город</th>
									<th data-toggle="true">ФИО</th>
									<th data-toggle="true">Телефон</th>
									<th data-toggle="true">Врач</th>
									<th data-toggle="true">Беременность</th>
                                    <th class="text-right" data-sort-ignore="true">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
									@if ($list1->count())
										@foreach ($list1 as $key => $record)
											<tr class="footable-odd">
												<td class="footable-visible">{{ $record->id }}</td>
												<td class="footable-visible">{!! $record->region !!}</td>
												<td class="footable-visible">{!! $record->city !!}</td>
												<td class="footable-visible"><a href="{{ route('admin_patient_info', $record->id) }}">{{ $record->last_name }} {{ $record->name }} {{ $record->second_name }}</a></td>
												<td class="footable-visible"><a href="tel:{{ $record->phone }}">{{ $record->phone }}</a></td>
												<td class="footable-visible">{!! $record->doctor !!}</td>
												<td class="footable-visible">{!! $record->pregnant !!}</td>
												<td class="text-right footable-visible footable-last-column">
													<div class="btn-group">
														<a href="{{ route('admin_patient_edit', $record->id) }}" class="btn-white btn btn-xs"><i class="fa fa-pencil"></i></a>
														<a href="/admin/delete_record/patient/{{ $record->id }}" class="btn-white btn btn-xs"><i class="fa fa-close"></i></a>
													</div>
												</td>
											</tr>
										@endforeach
									@else
										<tr><td colspan="12">Нет данных</td></tr>
									@endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="10">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
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
