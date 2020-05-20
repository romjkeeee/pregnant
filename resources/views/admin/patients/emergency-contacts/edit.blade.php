@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.patients.emergency-contacts.edit', $instance->id))
@section('form-action', route('admin.patients.emergency-contacts.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.patients.emergency-contacts.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку контактов</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            <strong style="margin-bottom: 10px!important;">Пациент <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'patient_id', 'placeholder' => 'Выберите пациента',
                     'route' => 'admin.preload.patients', 'default' => ['val' => $instance->patient_id, 'text' => $instance->patient->user->name ?? null]])
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Имя <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name', $instance->name ?? null) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Номер <span class="req">*</span></strong>
                <input type="text" name="phone" value="{{ old('phone', $instance->phone ?? null) }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
