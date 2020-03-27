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
						<h2>Добавить пользователя</h2>
					@else
						<h2>Редактировать пользователя</h2>
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">Панель администратора</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_users') }}">Пользователи</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить пользователя</strong>
							@else
								<strong>Редактировать пользователя</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!isset($id))
				<form action="{{ route('admin_uadd') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			@else
				<form action="{{ route('admin_uedit', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			@endif		
			@csrf
			<div class="row">
				<div class="col-lg-12">		
					@if ($errors->has('name'))
						<div class="alert alert-danger">{{ $errors->first('name') }}</div>
					@endif
					@if ($errors->has('email'))
						<div class="alert alert-danger">{{ $errors->first('email') }}</div>
					@endif						
					@if ($errors->has('phone'))
						<div class="alert alert-danger">{{ $errors->first('phone') }}</div>
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
								<label class="col-sm-2 control-label">Имя <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="name" value="{{ old('name', $rec->name) }}" class="form-control">
								</div>
							</div>	
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">E-mail <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="email" value="{{ old('email', $rec->email) }}" class="form-control">
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
								<label class="col-sm-2 control-label">Аватар <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="file" name="avatar" class="form-control">
									@if ($rec->avatar)
										<div style="width: 100px; height: 100px; margin-top: 20px; overflow: hidden; border: 1px dashed #ededed;">
											<img src="/{{ $rec->avatar }}" style="max-width: 100px; height: auto;">
										</div>
									@endif
								</div>
							</div>
								
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Активен <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="active" class="form-control">
									    <option value="1" @if (old('active', $rec->active) == '1') selected @endif>Да</option>
									    <option value="0" @if (old('active', $rec->active) == '0') selected @endif>Нет</option>
									</select>
								</div>
							</div>	
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Подтверждён <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="confirmed" class="form-control">
									    <option value="1" @if (old('confirmed', $rec->confirmed) == '1') selected @endif>Да</option>
									    <option value="0" @if (old('confirmed', $rec->confirmed) == '0') selected @endif>Нет</option>
									</select>
								</div>
							</div>								
                        </div>
                    </div>				
				</div>
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Информация для входа</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							@if (isset($id))
								<div class="alert alert-info">Если не хотите менять пароль, оставьте поля пустыми!</div>
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