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
						<h2>Настройки</h2>
					@else
						<h2>Настройки</h2>
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="/admin/users/parents">Панель администратора</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Настройки</strong>
							@else
								<strong>Настройки</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			<form action="{{ route('admin_settings') }}" method="POST" class="form-horizontal">
			@csrf
			<div class="row">
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Настройки</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							<div class="form-group">
								<label class="col-sm-4 control-label">Разрешить регистрацию родителей <span class="req">*</span></label>
								<div class="col-sm-8">
									<select name="parent_reg_av" class="form-control">
										<option value="1">Да</option>
										<option value="0">Нет</option>
									</select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>	
							<div class="form-group">
								<label class="col-sm-4 control-label">Разрешить регистрацию детей <span class="req">*</span></label>
								<div class="col-sm-8">
									<select name="child_reg_av" class="form-control">
										<option value="1">Да</option>
										<option value="0">Нет</option>
									</select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>								
							<div class="form-group">
								<label class="col-sm-4 control-label">Разрешить регистрацию тренеров <span class="req">*</span></label>
								<div class="col-sm-8">
									<select name="trainer_reg_av" class="form-control">
										<option value="1">Да</option>
										<option value="0">Нет</option>
									</select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>									
                        </div>
                    </div>				
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-4">
							<button class="btn btn-primary" type="submit">Сохранить</button>
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