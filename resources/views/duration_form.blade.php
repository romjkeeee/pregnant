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
						<h2>Добавить неделю</h2>
					@else
						<h2>Редактировать неделю</h2> 
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">Панель администратора</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_dur') }}">Недели</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить неделю</strong>
							@else
								<strong>Редактировать неделю</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!isset($id))
				<form action="{{ route('admin_dur_add') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@else
				<form action="{{ route('admin_dur_edit', $id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@endif		
			@csrf
			<div class="row">
				<div class="col-lg-12">
					@if ($errors->has('name'))
						<div class="alert alert-danger">{{ $errors->first('name') }}</div>
					@endif		
					@if ($errors->has('text'))
						<div class="alert alert-danger">{{ $errors->first('text') }}</div>
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
								<label class="col-sm-2 control-label">Порядок <span class="req">*</span></label>
                                <div class="col-sm-10"><input type="text" name="pos" value="{{ old('pos', $rec->pos) }}" class="form-control"></div>
							</div>							
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Название <span class="req">*</span></label>
                                <div class="col-sm-10"><input type="text" name="name" value="{{ old('name', $rec->name) }}" class="form-control"></div>
							</div>							
							<div class="hr-line-dashed"></div>	
                            <div class="form-group">
								<label class="col-sm-2 control-label">Описание <span class="req">*</span></label>
								<div class="col-sm-10">
									<textarea name="text" rows="10" class="form-control">{{ old('text', $rec->text) }}</textarea>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
								<label class="col-sm-2 control-label">Изображение <span class="req"></span></label>
								<div class="col-sm-10">
								    <input type="file" name="photo" class="form-control">
								    @if (isset($id))
								        @if ($rec->photo)
								            <div style="padding: 5px; border: 1px dashed #ededed; width: 200px; height: 200px;">
								                <img src="/{{ $rec->photo }}" style="max-width: 200px; height: auto;">
								            </div>
								        @endif
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
