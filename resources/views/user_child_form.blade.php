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
						<h2>Добавить ребёнка</h2>
					@else
						<h2>Редактировать ребёнка</h2> 
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="/admin/users/parents">Панель администратора</a>
                        </li>
                        <li>
                            <a href="/admin/users/parents">Пользователи</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить ребёнка</strong>
							@else
								<strong>Редактировать ребёнка</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!isset($id))
				<form action="{{ route('admin_ucadd') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@else
				<form action="{{ route('admin_ucedit', $id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@endif		
			@csrf
			<div class="row">
				<div class="col-lg-12">
					@if ($errors->has('parent_id'))
						<div class="alert alert-danger">{{ $errors->first('parent_id') }}</div>
					@endif	
					@if ($errors->has('team_id'))
						<div class="alert alert-danger">{{ $errors->first('team_id') }}</div>
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
								<label class="col-sm-2 control-label">Один из родителей <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="parent_id" class="form-control">
										<option value="">Выберите</option>
										@if ($parents->count())
											@foreach ($parents as $parent)
												<option value="{{ $parent->id }}" @if (old('parent_id', $rec->parent_id) == $parent->id) selected @endif>{{ $parent->last_name }} {{ $parent->name }} {{ $parent->second_name }}</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Команда <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="team_id" class="form-control">
										<option value="">Выберите</option>
										@if ($teams->count())
											@foreach ($teams as $team)
												<option value="{{ $team->id }}" @if (old('team_id', $rec->team_id) == $team->id) selected @endif>{{ $team->name }}</option>
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
							<div class="hr-line-dashed"></div>
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
								<label class="col-sm-2 control-label">Отчество <span class="req">*</span></label>
                                <div class="col-sm-10"><input type="text" name="second_name" value="{{ old('second_name', $rec->second_name) }}" class="form-control"></div>
							</div>										
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
								<label class="col-sm-2 control-label">Дата рождения <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="date_of_birth" value="{{ date('d.m.Y', strtotime(old('date_of_birth', $rec->date_of_birth))) }}" class="form-control"></div>
                            </div>		
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
								<label class="col-sm-2 control-label">E-mail</label>
								<div class="col-sm-10"><input type="text" name="email" value="{{ old('email', $rec->email) }}" class="form-control"></div>
                            </div>
							<div class="hr-line-dashed"></div>							
                            <div class="form-group">
								<label class="col-sm-2 control-label">Телефон</label>
								<div class="col-sm-10"><input type="text" name="phone" value="{{ old('phone', $rec->phone) }}" class="form-control"></div>
                            </div>		
							<div class="hr-line-dashed"></div>							
                            <div class="form-group">
								<label class="col-sm-2 control-label">Фото ребенка</label>
								<div class="col-sm-10">
									<input type="file" name="photo" value="" class="form-control">
									@if ($rec->photo)
										<a href="/{{ $rec->photo }}">
											<img src="/{{ $rec->photo }}" style="margin: 30px 0; max-width: 300px; height: auto;">
										</a>
									@endif
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
