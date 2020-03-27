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
						<h2>Добавить недвижимость</h2>
					@else
						<h2>Редактировать недвижимость</h2> 
					@endif
                    <ol class="breadcrumb">
                        <li>
                            <a href="/admin/arus">Панель администратора</a>
                        </li>
                        <li>
                            <a href="/admin/app">Недвижимость</a>
                        </li>
                        <li class="active">
							@if (!isset($id))
								<strong>Добавить недвижимость</strong>
							@else
								<strong>Редактировать недвижимость</strong>
							@endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			@if (!isset($id))
				<form action="{{ route('admin_appadd') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@else
				<form action="{{ route('admin_appedit', $id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@endif		
			@csrf
			<div class="row">
				<div class="col-lg-12">
					@if ($errors->has('arus_id'))
						<div class="alert alert-danger">{{ $errors->first('arus_id') }}</div>
					@endif
					@if ($errors->has('title'))
						<div class="alert alert-danger">{{ $errors->first('title') }}</div>
					@endif	
					@if ($errors->has('text'))
						<div class="alert alert-danger">{{ $errors->first('text') }}</div>
					@endif					
					@if ($errors->has('region_id'))
						<div class="alert alert-danger">{{ $errors->first('region_id') }}</div>
					@endif
					@if ($errors->has('city_id'))
						<div class="alert alert-danger">{{ $errors->first('city_id') }}</div>
					@endif
					@if ($errors->has('address'))
						<div class="alert alert-danger">{{ $errors->first('address') }}</div>
					@endif	
					@if ($errors->has('max_guests'))
						<div class="alert alert-danger">{{ $errors->first('max_guests') }}</div>
					@endif	
					@if ($errors->has('childs'))
						<div class="alert alert-danger">{{ $errors->first('childs') }}</div>
					@endif	
					@if ($errors->has('price_24h'))
						<div class="alert alert-danger">{{ $errors->first('price_24h') }}</div>
					@endif	
					@if ($errors->has('ext_price'))
						<div class="alert alert-danger">{{ $errors->first('ext_price') }}</div>
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
								<label class="col-sm-2 control-label">Арендодатель <span class="req">*</span></label>
								<div class="col-sm-10">
								    <select name="arus_id" class="form-control">
								        <option value="">Выберите</option>
								        @if ($arus->count())
								            @foreach ($arus as $ar)
								                <option value="{{ $ar->id }}" @if (old('arus_id', $rec->arus_id) == $ar->id) selected @endif>{{ $ar->last_name }} {{ $ar->name }} ({{ $ar->email }})</option>
								            @endforeach
								        @endif
								    </select>
								</div>
                            </div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
								<label class="col-sm-2 control-label">Название <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="title" value="{{ old('title', $rec->title) }}" class="form-control"></div>
                            </div>
							<div class="hr-line-dashed"></div>							
                            <div class="form-group">
								<label class="col-sm-2 control-label">Описание <span class="req">*</span></label>
								<div class="col-sm-10"><textarea name="text" rows="10" class="form-control">{{ old('text', $rec->text) }}</textarea></div>
                            </div>
							<div class="hr-line-dashed"></div>							
                            <div class="form-group">
								<label class="col-sm-2 control-label">Доп. информация <span class="req"></span></label>
								<div class="col-sm-10"><textarea name="text" rows="10" class="form-control summernote">{{ old('text', $rec->text) }}</textarea></div>
                            </div>                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
								<label class="col-sm-2 control-label">Главное фото <span class="req">*</span></label>
								<div class="col-sm-10">
								    <input type="file" name="main_photo" class="form-control">
								    @if (isset($id))
								        @if ($rec->main_photo)
								            <div style="padding: 5px; border: 1px dashed #ededed; width: 200px; height: 200px;">
								                <img src="/{{ $rec->main_photo }}" style="max-width: 200px; height: auto;">
								            </div>
								        @endif
                                    @endif
							    </div>
                            </div>                            
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Показывать в каталоге <span class="req"></span></label>
								<div class="col-sm-10">
								    <select name="active" class="form-control">
								        <option value="1" @if (old('active', $rec->active) == 1) selected @endif>Да, показывать</option>
								        <option value="0" @if (old('active', $rec->active) == 0) selected @endif>Нет, не показывать</option>
								    </select>
								</div>
							</div>                            
                        </div>
                    </div>				
				</div>
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Галерея</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							<div class="form-group">
							    <label class="col-sm-2 control-label">Галерея <span class="req"></span></label>
							    <div class="col-sm-10">
							        <input type="file" name="gallery[]" multiple class="form-control">
							        <div class="galc"></div>
							        @if (isset($id))
							            @if (is_array($gallery))
							                <div style="display: flex; margin-top: 20px; align-items: center; justify-content: flex-start;">
							                @foreach ($gallery as $gf)
							                    <div style="width: 100px; height: 100px; text-align: center; overflow: hidden;  padding: 5px; border: 1px dashed #ededed; margin-right: 5px;">
							                        <img src="/{{ $gf }}" style="max-width: 100px; height: auto;">
							                    </div>
							                @endforeach
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
                            <h5>Удобства</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            @if ($amenities->count())
                                @foreach ($amenities as $amen)
        							<div class="form-group">
        							    <label class="col-sm-2 control-label">{{ $amen->name }} <span class="req"></span></label>
        							    <div class="col-sm-10">
        							        <input type="checkbox" name="amenities[{{ $amen->id }}]" @if (isset($ameni[$amen->id])) checked @endif>
        							    </div>
        							</div>
							    @endforeach
					        @endif
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
												<option data-region="{{ $city->region_id }}" value="{{ $city->id }}" @if (old('city_id', $rec->city_id) == $city->id) selected @endif>{{ $city->name }}</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
                            <div class="form-group">
								<label class="col-sm-2 control-label">Адрес <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="address" value="{{ old('address', $rec->address) }}" class="form-control"></div>
                            </div>							
                        </div>
                    </div>
                </div>
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Размещение, стоимость и аукцион</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
							<div class="form-group">
								<label class="col-sm-2 control-label">Макс. кол-во гостей <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="max_guests" value="{{ old('max_guests', $rec->max_guests) }}" class="form-control"></div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Можно с детьми <span class="req">*</span></label>
								<div class="col-sm-10">
								    <select name="childs" class="form-control">
								        <option value="1" @if (old('childs', $rec->childs) == 1) selected @endif>Возможно размещение с детьми</option>
								        <option value="0" @if (old('childs', $rec->childs) == 0) selected @endif>Нет</option>
								    </select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Минимальная стоимость за 24 часа (RUB) <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="price_24h" value="{{ old('price_24h', $rec->price_24h) }}" class="form-control"></div>
							</div>
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Доплата за доп. гостя (RUB) <span class="req">*</span></label>
								<div class="col-sm-10"><input type="text" name="ext_price" value="{{ old('ext_price', $rec->ext_price) }}" class="form-control"></div>
							</div>							
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Аукцион <span class="req"></span></label>
								<div class="col-sm-10">
								    <select name="can_auction" class="form-control">
								        <option value="0" @if (old('childs', $rec->childs) == 0) selected @endif>Нет</option>
								        <option value="1" @if (old('childs', $rec->childs) == 1) selected @endif>Да, можно через аукцион</option>
								    </select>
								</div>
							</div>
							<div class="hr-line-dashed"></div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">Минимальная ставка <span class="req"></span></label>
								<div class="col-sm-10"><input type="text" name="min_bid" value="{{ old('min_bid', $rec->min_bid) }}" class="form-control"></div>
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
