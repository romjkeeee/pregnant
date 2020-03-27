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
						<h2>Добавить арендодателя</h2>
					@else
						<h2>Редактировать арендодателя</h2> 
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="/admin/arus">Панель администратора</a>
                        </li>
                        <li>
                            <a href="/admin/arus">Арендодатели</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить арендодателя</strong>
							@else
								<strong>Редактировать арендодателя</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!isset($id))
				<form action="{{ route('admin_arusadd') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@else
				<form action="{{ route('admin_arusedit', $id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@endif		
			@csrf
			<div class="row">
				<div class="col-lg-12">
					@if ($errors->has('last_name'))
						<div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
					@endif		
					@if ($errors->has('name'))
						<div class="alert alert-danger">{{ $errors->first('name') }}</div>
					@endif
					@if ($errors->has('email'))
						<div class="alert alert-danger">{{ $errors->first('email') }}</div>
					@endif
					@if ($errors->has('phone'))
						<div class="alert alert-danger">{{ $errors->first('phone') }}</div>
					@endif	
					@if ($errors->has('date_of_birth'))
						<div class="alert alert-danger">{{ $errors->first('date_of_birth') }}</div>
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
								<label class="col-sm-2 control-label">Фамилия <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="last_name" value="{{ old('last_name', $rec->last_name) }}" class="form-control"></div>
                            </div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Имя <span class="req">*</span></label>
                                <div class="col-sm-10"><input type="text" name="name" value="{{ old('name', $rec->name) }}" class="form-control"></div>
							</div>							
							<div class="hr-line-dashed"></div>	
                            <div class="form-group">
								<label class="col-sm-2 control-label">Дата рождения <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="date_of_birth" value="{{ date('d.m.Y', strtotime(old('date_of_birth', $rec->date_of_birth))) }}" class="form-control"></div>
                            </div>		
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
								<label class="col-sm-2 control-label">E-mail <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="email" value="{{ old('email', $rec->email) }}" class="form-control"></div>
                            </div>
							<div class="hr-line-dashed"></div>							
                            <div class="form-group">
								<label class="col-sm-2 control-label">Телефон <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="phone" value="{{ old('phone', $rec->phone) }}" class="form-control"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
								<label class="col-sm-2 control-label">Фото <span class="req"></span></label>
								<div class="col-sm-10">
								    <input type="file" name="avatar" class="form-control">
								    @if (isset($id))
								        @if ($rec->avatar)
								            <div style="padding: 5px; border: 1px dashed #ededed; width: 200px; height: 200px;">
								                <img src="/{{ $rec->avatar }}" style="max-width: 200px; height: auto;">
								            </div>
								        @endif
                                    @endif
							    </div>
                            </div>                            
                        </div>
                    </div>				
				</div>
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Локация</h5>
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
										<option value="">Выберите</option>
										@if ($regions->count())
											@foreach ($regions as $region)
												<option value="{{ $region->id }}" @if (old('region_id', $rec->region_id) == $region->id) selected @endif>{{ $region->name }}</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Город <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="city_id" class="form-control">
										<option value="">Выберите</option>
										@if ($cities->count())
											@foreach ($cities as $city)
												<option value="{{ $city->id }}" @if (old('city_id', $rec->city_id) == $city->id) selected @endif>{{ $city->name }}</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Верификация</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							<div class="form-group">
								<label class="col-sm-2 control-label">Верификация активна <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="verified" class="form-control">
									    <option value="1">Да</option>
										<option value="0">Нет</option>
									</select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Документ верификации 1 <span class="req"></span></label>
								<div class="col-sm-5">
								    <input type="file" name="ver1" class="form-control">
								    @if (isset($id))
								        @if ($rec->ver1)
								            <a href="/{{ $rec->ver1 }}">Ссылка на документ</a>
								        @endif
								    @endif
								</div>
								<div class="col-sm-5">
                                    <select name="ver1_type" class="form-control">
                                        <option value="">Тип документа</option>
                                        <option value="passport">Паспорт</option>
                                        <option value="driver">Вод. удостовение</option>
                                    </select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Документ верификации 2 <span class="req"></span></label>
								<div class="col-sm-5">
								    <input type="file" name="ver2" class="form-control">
								    @if (isset($id))
								        @if ($rec->ver1)
								            <a href="/{{ $rec->ver1 }}">Ссылка на документ</a>
								        @endif
								    @endif
								</div>
								<div class="col-sm-5">
                                    <select name="ver2_type" class="form-control">
                                        <option value="">Тип документа</option>
                                        <option value="passport">Паспорт</option>
                                        <option value="driver">Вод. удостовение</option>
                                    </select>
								</div>
							</div>
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
