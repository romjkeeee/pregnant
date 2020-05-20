@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.prices.create'))
@section('form-action', route('admin.clinics.prices.store'))
@section('header-btn')
    <a href="{{ route('admin.clinics.prices.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку цен</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-4">
            <strong style="margin-bottom: 10px!important;">Клиника <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'clinic_id', 'submit' => 'list', 'placeholder' => 'Выберите клинику',
            'route' => 'admin.preload.clinics', 'default' => ['val' => $instance->id ?? null, 'text' => $instance->name ?? null]])
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Цена <span class="req">*</span></strong>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
