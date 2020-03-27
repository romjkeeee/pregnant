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
                    <h2>Объект {{ $rec->title }}</h2>
					@if (session('error'))
						<div class="alert alert-danger">{{ session('error') }}</div>
					@endif
					@if (session('success'))
						<div class="alert alert-danger">{{ session('success') }}</div>
					@endif					
                    <ol class="breadcrumb">
                        <li>
                            <a href="/admin/arus">Панель администратора</a>
                        </li>
                        <li>
                            <a href="/admin/app">Недвижимость</a>
                        </li>
                        <li class="active">
                            <strong>Объект {{ $rec->title }}</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			<form action="{{ route('admin_app') }}" method="GET">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox">
                        <div class="ibox-content">
							<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
							<tr>
								<td>Арендодатель</td>
								<td>{!! $rec->arus !!}</td>
							</tr>
							<tr>
								<td>Телефон</td>
								<td>{!! $rec->arus_phone !!}</td>
							</tr>							
							<tr>
								<td>Верифицирован</td>
								<td>
								    @if ($rec->verified)
								        <span class="badge badge-success">Да, верифицирован</span>
								    @else
								        <span class="badge badge-danger">Нет</span>
								    @endif
								</td>
							</tr>								
							<tr>
								<td>Объект</td>
								<td>{{ $rec->title }}</td>
							</tr>							    
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
							<tr>
								<td>Размещение</td>
								<td>
									@if ($rec->active)
										<span class="badge badge-success">Активно</span>
									@else
										<span class="badge badge-warning">Неактивно</span>
									@endif
								</td>
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
								<td>Мин. цена за ночь (руб.)</td>
								<td>{{ number_format($rec->price_24h, 2, '.', '') }}</td>
							</tr>
							<tr>
								<td>За каждого доп. гостя (руб.)</td>
								<td>{{ number_format($rec->price_24h, 2, '.', '') }}</td>
							</tr>							
							<tr>
								<td>Можно с детьми</td>
								<td>
									@if ($rec->childs)
										<span class="badge badge-info">Возможно размещение</span>
									@else
										<span class="badge badge-warning">Нет</span>
									@endif
								</td>
							</tr>							    
							<tr>
								<td>Возможен аукцион</td>
								<td>
									@if ($rec->auction)
										<span class="badge badge-success">Аукцион</span>
									@else
										<span class="badge badge-danger">Нет</span>
									@endif
								</td>
							</tr>
							<tr>
								<td>Мин. ставка (руб.)</td>
								<td>{{ number_format($rec->min_bid, 2, '.', '') }}</td>
							</tr>							
							<tr>
								<td>Кол-во заявок по аукциону</td>
								<td>{{ $rec->auction_bid }}</td>
							</tr>
							<tr>
								<td>Заявок на бронь</td>
								<td>{{ $rec->default_bid }}</td>
							</tr>
							<tr>
								<td>Дата добавления</td>
								<td>{{ date('d.m.Y - H:i', strtotime($rec->created_at)) }}</td>
							</tr>
							</table>                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox">
                        <div class="ibox-content">
							@if (is_array($gallery))
							    <div style="display: flex; margin-top: 20px; align-items: center; justify-content: flex-start;">
							    @foreach ($gallery as $gf)
                                    <div style="width: 100px; height: 100px; text-align: center; overflow: hidden; display: flex; align-items: center; padding: 5px; border: 1px dashed #ededed; margin-right: 5px;">
                                        <a href="/{{ $gf }}">
							                <img src="/{{ $gf }}" style="max-width: 100px; height: auto;">
							            </a>
							        </div>
							    @endforeach
							    </div>
							@endif
                        </div>
                    </div>
                </div>    
                <div class="col-lg-6">
                    <div class="ibox">
                        <div class="ibox-content">
							<p><strong>Удобства:</strong></p>
							@if (is_array($amenities))
							    <ul>
							    @foreach ($amenities as $amen)
							        <li>{{ $amen }}</li>
							    @endforeach
							    </ul>
							@endif
                        </div>
                    </div>
                </div>                 
				<div class="col-lg-12">
					<a href="/admin/app/add" class="btn btn-success">Добавить объект</a>
					<a href="/admin/app/edit/{{ $rec->id }}" class="btn btn-primary">Изменить объект</a>
					<a href="/admin/delete_record/app/{{ $rec->id }}" class="btn btn-danger">Удалить объект</a>
					<br /><br />
				</div>
				<div class="col-lg-12">
					<div class="ibox">
						<div class="ibox-content">
							<h3>Заявки аукцион</h3>
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th data-toggle="true">#</th>
                                    <th data-toggle="true">Арендатор</th>
                                    <th data-toggle="true">Сумма</th>
									<th data-toggle="true">Дата</th> 
                                </tr>
                                </thead>
                                <tbody>
									@if ($list->count())
										@foreach ($list as $key => $record)
										    @if ($record->type !== 'auction')
										        @continue
										    @endif
											<tr class="footable-odd">
												<td class="footable-visible">{{ $record->id }}</td>		
												<td class="footable-visible">{!! $record->who !!}</td>
												<td class="footable-visible">{{ number_format($record->bid, 2, '.', '') }}</td>
												<td class="footable-visible">{{ date('d.m.Y - H:i:s', strtotime($record->created_at)) }}</td>
											</tr>
										@endforeach
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="ibox">
						<div class="ibox-content">
							<h3>Заявки бронь</h3>
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th data-toggle="true">#</th>
                                    <th data-toggle="true">Арендатор</th>
                                    <th data-toggle="true">Итого</th>
									<th data-toggle="true">Дата</th> 
                                </tr>
                                </thead>
                                <tbody>
									@if ($list->count())
										@foreach ($list as $key => $record)
										    @if ($record->type !== 'default')
										        @continue
										    @endif
											<tr class="footable-odd">
												<td class="footable-visible">{{ $record->id }}</td>		
												<td class="footable-visible">{!! $record->who !!}</td>
												<td class="footable-visible">{{ number_format($record->bid, 2, '.', '') }}</td>
												<td class="footable-visible">{{ date('d.m.Y - H:i:s', strtotime($record->created_at)) }}</td>
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
