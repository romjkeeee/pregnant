@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.prices.edit', $instance->id))
@section('form-action', route('admin.clinics.prices.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.clinics.prices.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку цен</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            <strong style="margin-bottom: 10px!important;">Клиника <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'clinic_id', 'submit' => 'list', 'placeholder' => 'Выберите клинику',
            'route' => 'admin.preload.clinics', 'default' => ['val' => $instance->clinic->id ?? null, 'text' => $instance->clinic->translate->name ?? null]])
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Цена <span class="req">*</span></strong>
                <input type="number" step="0.01" name="price" value="{{ old('price', $instance->price) }}" class="form-control">
            </div>
        </div>
        @include('components.multi-lang', ['fields' => [
               ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
        ]])
    </div>
@endsection
