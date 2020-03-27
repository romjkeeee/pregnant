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
						<h2>Добавить позицию</h2>
					@else
						<h2>Редактировать позицию</h2>
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">Панель администратора</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_clothes') }}">Одежда</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить позицию</strong>
							@else
								<strong>Редактировать позицию</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!isset($id))
				<form action="{{ route('admin_cladd') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			@else
				<form action="{{ route('admin_cledit', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			@endif		
			@csrf
			<div class="row">
				<div class="col-lg-12">		
					@if ($errors->has('user_id'))
						<div class="alert alert-danger">{{ $errors->first('user_id') }}</div>
					@endif
					@if ($errors->has('category_id'))
						<div class="alert alert-danger">{{ $errors->first('category_id') }}</div>
					@endif						
					@if ($errors->has('name'))
						<div class="alert alert-danger">{{ $errors->first('name') }}</div>
					@endif		
					@if ($errors->has('comment'))
						<div class="alert alert-danger">{{ $errors->first('comment') }}</div>
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
								<label class="col-sm-2 control-label">Кто добавил <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="user_id" class="form-control">
									    <option value="">Выберите пользователя</option>
									    @if ($users->count())
									        @foreach ($users as $user)
									            <option value="{{ $user->id }}" @if (old('user_id', $rec->user_id) == $user->id) selected @endif>{{ $user->name }} ({{ $user->phone }})</option>
									        @endforeach
									    @endif
									</select>
								</div>
							</div>	    
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Категория <span class="req">*</span></label>
								<div class="col-sm-10">
									<select name="category_id" class="form-control">
									    <option value="">Выберите категорию</option>
									    @if ($categories->count())
									        @foreach ($categories as $category)
									            <option value="{{ $category->id }}" @if (old('category_id', $rec->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
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
									<textarea name="comment" rows="10" class="form-control">{{ old('comment', $rec->comment) }}</textarea>
								</div>
							</div>
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Фото <span class="req">*</span></label>
								<div class="col-sm-10">
									<input type="file" name="photo" class="form-control">
									@if ($rec->photo)
										<div style="width: 100px; height: 100px; margin-top: 20px; overflow: hidden; border: 1px dashed #ededed;">
											<img src="/{{ $rec->photo }}" style="max-width: 100px; height: auto;">
										</div>
									@endif
								</div>
							</div>								
                        </div>
                    </div>				
				</div>
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Свойства</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							@if ($props->count())
								@foreach ($props as $prop)
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ $prop->name }} <span class="req"></span></label>
										<div class="col-sm-10">
											<select name="props[{{ $prop->id }}]" class="form-control">
												<option value="">Не применяется</option>
												@foreach ($prop->values as $value)
													<option value="{{ $value }}" @if (isset($my_props[$prop->id])) @if ($my_props[$prop->id] == $value) selected @endif @endif>{{ $value }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
								@endforeach
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