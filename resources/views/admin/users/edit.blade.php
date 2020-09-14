@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.users.edit', $instance->id))
@section('form-action', route('admin.users.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.users.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку пользователей</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Фамилия <span class="req">*</span></strong>
                <input type="text" name="last_name" value="{{ old('last_name', $instance->last_name) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Имя <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name', $instance->name) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Отчество <span class="req">*</span></strong>
                <input type="text" name="second_name" value="{{ old('second_name', $instance->second_name) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Телефон <span class="req">*</span></strong>
                <input type="text" name="phone" value="{{ old('phone', $instance->phone) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Почта <span class="req">*</span></strong>
                <input type="text" name="email" value="{{ old('email', $instance->email) }}" class="form-control">
            </div>
        </div>
        <hr>
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'region_id','title' => 'Регион<span class="req">*</span>',
                     'route' => 'admin.preload.regions', 'default' => ['val' => $instance->region_id ?? null, 'text' => $instance->region->translate->name ?? null]])
        </div>
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'city_id','title' => 'Город<span class="req">*</span>',
                     'route' => 'admin.preload.cities', 'default' => ['val' => $instance->city_id ?? null, 'text' => $instance->city->translate->name ?? null]])
        </div>
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'district_id','title' => 'Район<span class="req">*</span>',
                     'route' => 'admin.preload.districts', 'default' => ['val' => $instance->district_id ?? null, 'text' => $instance->district->translate->name ?? null]])
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Улица <span class="req">*</span></strong>
                <input type="text" name="street" value="{{ old('street', $instance->street) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Дом <span class="req">*</span></strong>
                <input type="text" name="building" value="{{ old('building', $instance->building) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Квартира</strong>
                <input type="text" name="apartment" value="{{ old('apartment', $instance->apartment) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Роль <span class="req">*</span></strong>
                <select name="role" class="form-control">
                    <option value="">Выберите роль</option>
                    @foreach(['doctor', 'patient'] as $role)
                        <option value="{{ $role }}" @if(old('role', $instance->role) == $role) selected @endif>{{ $role }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Новый пароль</strong>
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Изображение <span class="req">*</span></strong>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control">
            </div>
            @if($instance->image)
                <a href="{{ asset($instance->image) }}" target="_blank">
                    <img src="{{ asset($instance->image) }}" height="100px">
                </a>
            @endif
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-inline" style="margin-top: 30px; margin-left: 10px">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" @if($instance->verified) checked @endif value="1" name="verified">
                <label class="form-check-label" for="inlineCheckbox1">Подтвержден?</label>
            </div>
        </div>
    </div>
@endsection
