@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.patients.weights.edit', $instance->id))
@section('form-action', route('admin.patients.weights.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.patients.weights.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку замеров веса</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <strong style="margin-bottom: 10px!important;">Пациент <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'patient_id', 'placeholder' => 'Выберите пациента',
                     'route' => 'admin.preload.patients', 'default' => ['val' => $instance->patient_id, 'text' => $instance->patient->user->fullName ?? null]])
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Вес <span class="req">*</span></strong>
                <input type="number" step="0.01" name="weights" value="{{ old('weights', $instance->weights ?? null) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Дата замера <span class="req">*</span></strong>
                <input type="date" name="date" value="{{ old('date', $instance->date ? $instance->date->format('Y-m-d') : null) }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
