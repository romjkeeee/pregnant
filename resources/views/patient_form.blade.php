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
						<h2>Добавить пациента</h2>
					@else
						<h2>Редактировать пациента</h2>
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">Панель администратора</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_patient') }}">Пациенты</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить пациента</strong>
							@else
								<strong>Редактировать пациента</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!isset($id))
				<form action="{{ route('admin_patient_add') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			@else
				<form action="{{ route('admin_patient_edit', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
					@if ($errors->has('last_name'))
						<div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
					@endif					
					@if ($errors->has('name'))
						<div class="alert alert-danger">{{ $errors->first('name') }}</div>
					@endif		
					@if ($errors->has('second_name'))
						<div class="alert alert-danger">{{ $errors->first('second_name') }}</div>
					@endif
					@if ($errors->has('date_of_birth'))
						<div class="alert alert-danger">{{ $errors->first('date_of_birth') }}</div>
					@endif					
					@if ($errors->has('password'))
						<div class="alert alert-danger">{{ $errors->first('password') }}</div>
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
								<label class="col-sm-2 control-label">Клиника <span class="req"></span></label>
								<div class="col-sm-10">
									<select name="clinic_id" class="form-control">
										<option value="">Выберите клинику</option>
									    @if ($clinics->count())
									        @foreach ($clinics as $clinic)
									            <option value="{{ $clinic->id }}" @if (old('clinic_id', $rec->clinic_id) == $clinic->id)) selected @endif>{{ $clinic->name }}</option>
									        @endforeach
									    @endif
									</select>
								</div>
							</div>	    
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Врач <span class="req"></span></label>
								<div class="col-sm-10">
									<select name="doctor_id" class="form-control">
										<option value="">Выберите врача</option>
									    @if ($doctors->count())
									        @foreach ($doctors as $doctor)
									            <option value="{{ $doctor->id }}" @if (old('doctor_id', $rec->doctor_id) == $doctor->id)) selected @endif>{{ $doctor->last_name }} {{ $doctor->name }} {{ $doctor->second_name }}</option>
									        @endforeach
									    @endif
									</select>
								</div>
							</div>	
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Фамилия <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="last_name" value="{{ old('last_name', $rec->last_name) }}" class="form-control">
								</div>
							</div>								
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Имя <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="name" value="{{ old('name', $rec->name) }}" class="form-control">
								</div>
							</div>	
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Отчество <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="second_name" value="{{ old('second_name', $rec->second_name) }}" class="form-control">
								</div>
							</div>	
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Дата рождения <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="date_of_birth" value="{{ old('date_of_birth', $rec->date_of_birth) }}" class="form-control">
								</div>
							</div>	
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Телефон <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="phone" value="{{ old('phone', $rec->phone) }}" class="form-control">
								</div>
							</div>
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Беременность <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="pregnant" class="form-control">
										<option value="1" @if (old('pregnant', $rec->pregnant) == '1') selected @endif>Да</option>
										<option value="0" @if (old('pregnant', $rec->pregnant) == '0') selected @endif>Нет</option>
									</select>
								</div>
							</div>
							<div class="hr-line-dashed duration_div" style="display: none;"></div>							
							<div class="form-group duration_div" style="display: none;">
								<label class="col-sm-2 control-label">Срок <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="duration_id" class="form-control">
										<option value="">Выберите</option>
										@if ($durations->count())
											@foreach ($durations as $duration)
												<option value="{{ $duration->id }}" @if (old('duration_id', $rec->duration_id) == $duration->id)) selected @endif>{{ $duration->name }}</option>
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
                            <h5>Доступ</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							@if (isset($id))
								<div class="alert alert-warning">Если Вы не желаете менять пароль, оставьте поля пустыми!</div>
							@endif
							<div class="form-group">
								<label class="col-sm-2 control-label">Пароль <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="password" name="password" class="form-control">
								</div>
							</div>	
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Ещё раз <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="password" name="password_confirmation" class="form-control">
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