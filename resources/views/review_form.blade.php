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
						<h2>Добавить отзыв</h2>
					@else
						<h2>Редактировать отзыв</h2> 
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">Панель администратора</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_reviews') }}">Отзывы</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить отзыв</strong>
							@else
								<strong>Редактировать отзыв</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!$selected)
				<form action="{{ route('admin_reviews_add') }}" method="GET" class="form-horizontal">
			@else
				@if (!isset($id))
					<form action="{{ route('admin_reviews_add') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
				@else
					<form action="{{ route('admin_reviews_edit', $id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
				@endif		
			@endif		
			@csrf
			<div class="row">
				<div class="col-lg-12">
					@if ($errors->has('is_for'))
						<div class="alert alert-danger">{{ $errors->first('is_for') }}</div>
					@endif	
					@if ($errors->has('for_id'))
						<div class="alert alert-danger">{{ $errors->first('for_id') }}</div>
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
							@if (!$selected)
								<div class="form-group">
									<label class="col-sm-2 control-label">Кому отзыв <span class="req">*</span></label>
									<div class="col-sm-10">
										<select name="is_for" class="form-control">
											<option value="doctor">Врачу</option>
											<option value="clinic">Клинике</option>			
										</select>
									</div>
								</div>
							@else
								<input type="hidden" name="is_for" value="{{ $selected }}">
								<div class="form-group">
									<label class="col-sm-2 control-label">Пациент <span class="req">*</span></label>
									<div class="col-sm-10">
										<select name="user_id" class="form-control">
											<option value="">Выберите от кого отзыв</option>
											@if ($patients->count())
												@foreach ($patients as $patient)
													<option value="{{ $patient->id }}" @if (old('user_id', $rec->user_id) == $patient->id) selected @endif>{{ $patient->last_name }} {{ $patient->name }} {{ $patient->second_name }}</option>
												@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								@if ($selected == 'doctor')
									<div class="form-group">
										<label class="col-sm-2 control-label">Врач <span class="req">*</span></label>
										<div class="col-sm-10">
											<select name="for_id" class="form-control">
											   <option value="">Выберите</option>
												@if ($doctors->count())
													@foreach ($doctors as $doctor)
														<option value="{{ $doctor->id }}" @if (old('for_id', $rec->for_id) == $doctor->id) selected @endif>{{ $doctor->last_name }} {{ $doctor->name }} {{ $doctor->second_name }}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
								@else
									<div class="form-group">
										<label class="col-sm-2 control-label">Клиника <span class="req">*</span></label>
										<div class="col-sm-10">
											<select name="for_id" class="form-control">
											   <option value="">Выберите</option>
												@if ($clinics->count())
													@foreach ($clinics as $clinic)
														<option value="{{ $clinic->id }}" @if (old('for_id', $rec->for_id) == $clinic->id) selected @endif>{{ $clinic->name }}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>									
								@endif
								<div class="hr-line-dashed"></div>  
								<div class="form-group">
									<label class="col-sm-2 control-label">Текст <span class="req">*</span></label>
									<div class="col-sm-10">
										<textarea rows="10" name="text" class="form-control">{{ old('text', $rec->text) }}</textarea>
									</div>
								</div>
								<div class="hr-line-dashed"></div>							
								<div class="form-group">
									<label class="col-sm-2 control-label">Рейтинг <span class="req">*</span></label>
									<div class="col-sm-10">
										<input type="hidden" name="rating" value="5">
										<div class="rate_select">
											@if (!isset($id))
												<a href="javascript:void(0);" data-stars="1"><i class="fa fa-star"></i></a>
												<a href="javascript:void(0);" data-stars="2"><i class="fa fa-star"></i></a>
												<a href="javascript:void(0);" data-stars="3"><i class="fa fa-star"></i></a>
												<a href="javascript:void(0);" data-stars="4"><i class="fa fa-star"></i></a>
												<a href="javascript:void(0);" data-stars="5"><i class="fa fa-star"></i></a>
											@else
												<?php $last = 0; ?>
												@for ($a = 0; $a < $rec->rate; $a++)
													<a href="javascript:void(0);" data-stars="{{ $a + 1 }}"><i class="fa fa-star"></i></a>
													<?php $last++; ?>
												@endfor
												@for ($a = $last; $a < (5 - $rec->rate + $last); $a++)
													<a href="javascript:void(0);" data-stars="{{ $a + 1 }}"><i class="fa fa-star-o"></i></a>
												@endfor
											@endif
										</div>
									</div>
								</div>
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
