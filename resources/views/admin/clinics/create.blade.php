@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.create'))
@section('form-action', route('admin.clinics.store'))
@section('header-btn')
    <a href="{{ route('admin.clinics.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку клиник</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Телефон <span class="req">*</span></strong>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Тип <span class="req">*</span></strong>
                <select name="type" class="form-control">
                    <option value="">Выберите тип</option>
                    <option value="state">Государственная</option>
                    <option value="private">Частная</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'region_id','title' => 'Регион<span class="req">*</span>', 'route' => 'admin.preload.regions'])
        </div>
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'city_id','title' => 'Город<span class="req">*</span>', 'route' => 'admin.preload.cities'])
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Адрес <span class="req">*</span></strong>
                <input type="text" name="address" value="{{ old('address') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Долгота <span class="req">*</span></strong>
                <input type="text" name="lng" value="{{ old('lng') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Широта <span class="req">*</span></strong>
                <input type="text" name="lat" value="{{ old('lat') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Изображение <span class="req">*</span></strong>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Описание <span class="req">*</span></strong>
                <textarea type="text" name="text" class="form-control">{{ old('text') }}</textarea>
            </div>
        </div>
    </div>
@endsection
