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
					@if (!isset($id))
						<h2>Добавить клинику</h2>
					@else
						<h2>Редактировать клинику</h2>
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">Панель администратора</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_clinic') }}">Клиники</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить клинику</strong>
							@else
								<strong>Редактировать клинику</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!isset($id))
				<form action="{{ route('admin_clinic_add') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			@else
				<form action="{{ route('admin_clinic_edit', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			@endif		
			@csrf
			<div class="row">
				<div class="col-lg-12">		
					@if ($errors->has('region_id'))
						<div class="alert alert-danger">{{ $errors->first('region_id') }}</div>
					@endif					
					@if ($errors->has('city_id'))
						<div class="alert alert-danger">{{ $errors->first('city_id') }}</div>
					@endif		
					@if ($errors->has('name'))
						<div class="alert alert-danger">{{ $errors->first('name') }}</div>
					@endif	
					@if ($errors->has('text'))
						<div class="alert alert-danger">{{ $errors->first('text') }}</div>
					@endif
					@if ($errors->has('address'))
						<div class="alert alert-danger">{{ $errors->first('address') }}</div>
					@endif					
				</div>
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Общая информация</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							<div class="form-group">
								<label class="col-sm-2 control-label">Регион <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="region_id" class="form-control">
										<option value="">Выберите регион</option>
									    @if ($regions->count())
									        @foreach ($regions as $region)
									            <option value="{{ $region->id }}" @if (old('region_id', $rec->region_id) == $region->id)) selected @endif>{{ $region->name }}</option>
									        @endforeach
									    @endif
									</select>
								</div>
							</div>	    
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Город <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="city_id" class="form-control" disabled>
										<option value="">Выберите регион</option>
									    @if ($cities->count())
									        @foreach ($cities as $city)
									            <option data-region="{{ $city->region_id }}" value="{{ $city->id }}" @if (old('city_id', $rec->city_id) == $city->id)) selected @endif>{{ $city->name }}</option>
									        @endforeach
									    @endif
									</select>
								</div>
							</div>	 						
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Название <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="name" value="{{ old('name', $rec->name) }}" class="form-control">
								</div>
							</div>	
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Описание <span class="req">*</span></label>
								<div class="col-sm-10">
									<textarea name="text" rows="5" class="form-control">{{ old('name', $rec->name) }}</textarea>
								</div>
							</div>	
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Адрес <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="address" value="{{ old('address', $rec->address) }}" class="form-control">
								</div>
							</div>								
                        </div>
                    </div>				
				</div>
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>На карте</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							@if ($rec->lng)
								<input type="hidden" name="lng" value="{{ $rec->lng }}">
								<input type="hidden" name="lat" value="{{ $rec->lat }}">
								<div id="map" style="width: 100%; height: 300px;"></div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-4">
							@if (!isset($id))
								<button class="btn btn-primary" type="submit">Добавить</button>
							@else
								<button class="btn btn-primary" type="submit">Сохранить</button>
							@endif
						</div>
					</div>				
				</div>
			</div>
			</form>
        </div>
        <div class="footer">
            <div class="pull-right">
                
            </div>
            <div>
            </div>
        </div>
        </div>
@endsection