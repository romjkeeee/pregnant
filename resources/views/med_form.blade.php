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
						<h2>Добавить врача</h2>
					@else
						<h2>Редактировать врача</h2>
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">Панель администратора</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_med') }}">Врачи</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить врача</strong>
							@else
								<strong>Редактировать врача</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!isset($id))
				<form action="{{ route('admin_med_add') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			@else
				<form action="{{ route('admin_med_edit', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
					@if ($errors->has('second_name'))
						<div class="alert alert-danger">{{ $errors->first('second_name') }}</div>
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
								<label class="col-sm-2 control-label">Специализации <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="spec[]" multiple class="form-control">
									    @if ($spec->count())
									        @foreach ($spec as $sp)
									            <option value="{{ $sp->id }}" @if (in_array($sp->id, $my_spec)) selected @endif>{{ $sp->name }}</option>
									        @endforeach
									    @endif
									</select>
								</div>
							</div>	    
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Клиники <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="clinics[]" multiple class="form-control">
									    @if ($clinics->count())
									        @foreach ($clinics as $clinic)
									            <option value="{{ $clinic->id }}" @if (in_array($clinic->id, $my_clinics)) selected @endif>{{ $clinic->region }}, {{ $clinic->city }}, {{ $clinic->name }}</option>
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
								<label class="col-sm-2 control-label">Телефон <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="text" name="phone" value="{{ old('phone', $rec->phone) }}" class="form-control">
								</div>
							</div>								
                        </div>
                    </div>				
				</div>
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>График</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							<div class="form-group">
								<label class="col-sm-2 control-label">Понедельник <span class="req">*</span></label>
								<div class="col-sm-3">
									<p>с</p>
									<input type="text" name="from[1]" class="form-control time_mask">
								</div>
								<div class="col-sm-3">
									<p>до</p>
									<input type="text" name="to[1]" class="form-control time_mask">
								</div>
								<div class="col-sm-4">
									<p>каждый понедельник</p>
									<input type="checkbox" name="every[1]">&nbsp; да, каждый понедельник
								</div>
							</div>	
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Вторник <span class="req">*</span></label>
								<div class="col-sm-3">
									<p>с</p>
									<input type="text" name="from[2]" class="form-control time_mask">
								</div>
								<div class="col-sm-3">
									<p>до</p>
									<input type="text" name="to[2]" class="form-control time_mask">
								</div>
								<div class="col-sm-4">
									<p>каждый вторник</p>
									<input type="checkbox" name="every[2]">&nbsp; да, каждый вторник
								</div>
							</div>	
							<div class="hr-line-dashed"></div>	
							<div class="form-group">
								<label class="col-sm-2 control-label">Среда <span class="req">*</span></label>
								<div class="col-sm-3">
									<p>с</p>
									<input type="text" name="from[3]" class="form-control time_mask">
								</div>
								<div class="col-sm-3">
									<p>до</p>
									<input type="text" name="to[3]" class="form-control time_mask">
								</div>
								<div class="col-sm-4">
									<p>каждую среду</p>
									<input type="checkbox" name="every[3]">&nbsp; да, каждую среду
								</div>
							</div>	
							<div class="hr-line-dashed"></div>	
							<div class="form-group">
								<label class="col-sm-2 control-label">Четверг <span class="req">*</span></label>
								<div class="col-sm-3">
									<p>с</p>
									<input type="text" name="from[4]" class="form-control time_mask">
								</div>
								<div class="col-sm-3">
									<p>до</p>
									<input type="text" name="to[4]" class="form-control time_mask">
								</div>
								<div class="col-sm-4">
									<p>каждый четверг</p>
									<input type="checkbox" name="every[4]">&nbsp; да, каждый четверг
								</div>
							</div>	
							<div class="hr-line-dashed"></div>	
							<div class="form-group">
								<label class="col-sm-2 control-label">Пятница <span class="req">*</span></label>
								<div class="col-sm-3">
									<p>с</p>
									<input type="text" name="from[5]" class="form-control time_mask">
								</div>
								<div class="col-sm-3">
									<p>до</p>
									<input type="text" name="to[5]" class="form-control time_mask">
								</div>
								<div class="col-sm-4">
									<p>каждую пятницу</p>
									<input type="checkbox" name="every[5]">&nbsp; да, каждую пятницу
								</div>
							</div>	
							<div class="hr-line-dashed"></div>	
							<div class="form-group">
								<label class="col-sm-2 control-label">Суббота <span class="req">*</span></label>
								<div class="col-sm-3">
									<p>с</p>
									<input type="text" name="from[6]" class="form-control time_mask">
								</div>
								<div class="col-sm-3">
									<p>до</p>
									<input type="text" name="to[6]" class="form-control time_mask">
								</div>
								<div class="col-sm-4">
									<p>каждую субботу</p>
									<input type="checkbox" name="every[6]">&nbsp; да, каждую субботу
								</div>
							</div>	
							<div class="hr-line-dashed"></div>	
							<div class="form-group">
								<label class="col-sm-2 control-label">Воскресенье <span class="req">*</span></label>
								<div class="col-sm-3">
									<p>с</p>
									<input type="text" name="from[7]" class="form-control time_mask">
								</div>
								<div class="col-sm-3">
									<p>до</p>
									<input type="text" name="to[7]" class="form-control time_mask">
								</div>
								<div class="col-sm-4">
									<p>каждое воскресенье</p>
									<input type="checkbox" name="every[7]">&nbsp; да, каждое воскресенье
								</div>
							</div>	
							<div class="hr-line-dashed"></div>								
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