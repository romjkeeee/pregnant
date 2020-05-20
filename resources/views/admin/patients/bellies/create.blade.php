@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.patients.bellies.create'))
@section('form-action', route('admin.patients.bellies.store'))
@section('header-btn')
    <a href="{{ route('admin.patients.bellies.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку замеров</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            <strong style="margin-bottom: 10px!important;">Пациент <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'patient_id', 'placeholder' => 'Выберите пациента', 'route' => 'admin.preload.patients'])
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Когда были сделаны замеры <span class="req">*</span></strong>
                <input type="date" name="date" value="{{ old('date') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Высота стояния дна матки <span class="req">*</span></strong>
                <input type="number" step="0.01" name="uterine_fundus_height" value="{{ old('uterine_fundus_height') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Обхват живота <span class="req">*</span></strong>
                <input type="number" step="0.01" name="girth_abdomen" value="{{ old('girth_abdomen') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
