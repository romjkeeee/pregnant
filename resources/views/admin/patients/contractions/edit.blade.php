@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.patients.contractions.edit', $instance->id))
@section('form-action', route('admin.patients.contractions.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.patients.contractions.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку счетчиков</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            <strong style="margin-bottom: 10px!important;">Пациент <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'patient_id', 'placeholder' => 'Выберите пациента', 'route' => 'admin.preload.patients'])
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Начало <span class="req">*</span></strong>
                <input type="datetime-local" name="start" value="{{ old('start', $instance->start ? $instance->start->format('Y-m-d\TH:i') : null) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Длительность <span class="req">*</span></strong>
                <input type="time" name="start" value="{{ old('time', $instance->time ?? null) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Интервал <span class="req">*</span></strong>
                <input type="time" name="interval" value="{{ old('interval', $instance->interval ?? null) }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
