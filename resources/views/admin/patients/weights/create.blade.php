@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.patients.weights.create'))
@section('form-action', route('admin.patients.weights.store'))
@section('header-btn')
    <a href="{{ route('admin.patients.weights.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку замеров веса</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-12">
            <strong style="margin-bottom: 10px!important;">Пациент <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'patient_id', 'placeholder' => 'Выберите пациента', 'route' => 'admin.preload.patients'])
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Вес <span class="req">*</span></strong>
                <input type="number" step="0.01" name="weights" value="{{ old('weights') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Дата замера <span class="req">*</span></strong>
                <input type="date" name="date" value="{{ old('date') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
