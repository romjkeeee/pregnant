@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.cities.create'))
@section('form-action', route('admin.cities.store'))
@section('header-btn')
    <a href="{{ route('admin.cities.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку городов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            <strong style="margin-bottom: 10px!important;margin-left: 5px">Регион <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'region_id', 'submit' => 'list', 'placeholder' => 'Выберите регион',
                     'route' => 'admin.preload.regions'])
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
