@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.patients.edit', $instance->id))
@section('form-action', route('admin.patients.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.patients.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку пациентов</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            @include('components.ajax-select', ['name' => 'user_id','title' => 'Пользователь<span class="req">*</span>',
                     'route' => 'admin.preload.users', 'default' => ['val' => $instance->user_id, 'text' => $instance->user->fullName ?? "#{$instance->user_id}"]])
        </div>
        <div class="col-lg-4">
            @include('components.ajax-select', ['name' => 'clinic_id','title' => 'Клиника<span class="req">*</span>',
                     'route' => 'admin.preload.clinics', 'default' => ['val' => $instance->clinic_id, 'text' => $instance->clinic->translate->name ?? "#{$instance->clinic_id}"]])
        </div>
        <div class="col-lg-4">
            @include('components.ajax-select', ['name' => 'doctor_id','title' => 'Доктор<span class="req">*</span>',
                     'route' => 'admin.preload.doctors', 'default' => ['val' => $instance->doctor_id, 'text' => $instance->doctor->user->fullName ?? "#{$instance->doctor_id}"]])
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Дата рождения <span class="req">*</span></strong>
                <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $instance->date_of_birth ? $instance->date_of_birth->format('Y-m-d') : null) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-check form-check-inline" style="margin-top: 30px; margin-left: 10px">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" @if(old('pregnant', $instance->pregnant)) checked @endif value="1" name="pregnant">
                <label class="form-check-label" for="inlineCheckbox1">Беременна?</label>
            </div>
        </div>
    </div>
@endsection
