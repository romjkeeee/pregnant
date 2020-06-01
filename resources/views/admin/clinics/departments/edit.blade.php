@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.departments.edit', $instance->id))
@section('form-action', route('admin.clinics.departments.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.clinics.departments.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку отделений</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'clinic_id','title' => 'Клиника<span class="req">*</span>',
                     'route' => 'admin.preload.clinics', 'default' => ['val' => $instance->clinic_id, 'text' => $instance->clinic->translate->name ?? null]])
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name', $instance->name) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Улица <span class="req">*</span></strong>
                <input type="text" name="street" value="{{ old('street', $instance->street) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Дом <span class="req">*</span></strong>
                <input type="text" name="building" value="{{ old('building', $instance->building) }}" class="form-control">
            </div>
        </div>


    </div>
@endsection
