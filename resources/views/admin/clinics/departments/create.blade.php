@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.departments.create'))
@section('form-action', route('admin.clinics.departments.store'))
@section('header-btn')
    <a href="{{ route('admin.clinics.departments.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку департаментов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'clinic_id','title' => 'Клиника<span class="req">*</span>', 'route' => 'admin.preload.clinics'])
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Улица <span class="req">*</span></strong>
                <input type="text" name="street" value="{{ old('street') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Дом <span class="req">*</span></strong>
                <input type="text" name="building" value="{{ old('building') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
