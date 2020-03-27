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
															
                    <ol class="breadcrumb">
                        <li>
                            <a href="/admin/arus">Панель администратора</a>
                        </li>
                        <li>
                            <a href="/admin/app">Недвижимость</a>
                        </li>
                        <li class="active">
                            <strong>{{ $page_title }}</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4 text-right">
					<a href="http://vozduh.weedoo.ru/admin/arenus/add" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
                </div>
            </div>        
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			<form action="{{ route('admin_app') }}" method="GET">
            <div class="row">
				<div class="col-lg-12">
					<div class="ibox">
						<div class="ibox-content">
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th data-toggle="true">#</th>
                                    <th data-toggle="true">Кто оставил</th>
                                    <th data-toggle="true">Сумма</th>
                                    <th data-toggle="true">Статус</th>
									<th data-toggle="true">Дата</th> 
                                </tr>
                                </thead>
                                <tbody>
									@if ($list->count())
										@foreach ($list as $key => $record)
											<tr class="footable-odd">
												<td class="footable-visible">{{ $record->id }}</td>		
												<td class="footable-visible">{!! $record->who !!}</td>
												<td class="footable-visible">{{ number_format($record->bid, 2, '.', '') }}</td>
												<td class="footable-visible">
												    @if ($record->paid)
												        <span class="badge badge-success">Оплачена</span>
												    @else
												        <span class="badge badge-warning">Не оплачена</span>
												    @endif
												</td>
												<td class="footable-visible">{{ date('d.m.Y - H:i:s', strtotime($record->created_at)) }}</td>
											</tr>
										@endforeach
									@else
									    <tr>
									        <td class="footable-visible" colspan="6">Нет информации!</td>
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
