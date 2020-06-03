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
        @include('components.multi-lang', ['fields' => [
                ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
                ['title' => 'Улица <span class="req">*</span>', 'name' => 'street'],
                ['title' => 'Дом <span class="req">*</span>', 'name' => 'building']
        ]])
    </div>
@endsection
