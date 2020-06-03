@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.departments.create'))
@section('form-action', route('admin.clinics.departments.store'))
@section('header-btn')
    <a href="{{ route('admin.clinics.departments.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку департаментов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'clinic_id','title' => 'Клиника<span class="req">*</span>', 'route' => 'admin.preload.clinics'])
        </div>
        @include('components.multi-lang', ['fields' => [
               ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
               ['title' => 'Улица <span class="req">*</span>', 'name' => 'street'],
               ['title' => 'Дом <span class="req">*</span>', 'name' => 'building']
       ]])
    </div>
@endsection
