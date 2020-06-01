@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.edit', $instance->id))
@section('form-action', route('admin.clinics.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.clinics.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку клиник</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Телефон <span class="req">*</span></strong>
                <input type="text" name="phone" value="{{ old('phone', $instance->phone) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Тип <span class="req">*</span></strong>
                <select name="type" class="form-control">
                    <option value="">Выберите тип</option>
                    <option value="state" @if($instance->type == 'state') selected @endif>Государственная</option>
                    <option value="private" @if($instance->type == 'private') selected @endif>Частная</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'region_id','title' => 'Регион<span class="req">*</span>',
                     'route' => 'admin.preload.regions', 'default' => ['val' => $instance->region_id, 'text' => $instance->region->translate->name ?? null]])
        </div>
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'city_id','title' => 'Город<span class="req">*</span>',
                     'route' => 'admin.preload.cities', 'default' => ['val' => $instance->city_id, 'text' => $instance->city->translate->name ?? null]])
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Долгота <span class="req">*</span></strong>
                <input type="text" name="lng" value="{{ old('lng', $instance->lng) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Широта <span class="req">*</span></strong>
                <input type="text" name="lat" value="{{ old('lat', $instance->lat) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Изображение <span class="req">*</span></strong>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            @if($instance->image)
                <div class="bg-image" style="background-image: url('{{ asset($instance->image) }}'); height: 200px;margin-left: 5px"></div>
            @endif
        </div>
        @include('components.multi-lang', ['fields' => [
             ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
             ['title' => 'Адрес <span class="req">*</span>', 'name' => 'address'],
             ['title' => 'Описание <span class="req">*</span>', 'name' => 'text', 'tag' => 'textarea']
        ]])
    </div>
@endsection
