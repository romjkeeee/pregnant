@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.create'))
@section('form-action', route('admin.doctors.store'))
@section('header-btn')
    <a href="{{ route('admin.doctors.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку докторов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'user_id','title' => 'Пользователь<span class="req">*</span>',
                     'route' => 'admin.preload.users', 'default' => ['val' => '', 'text' => '']])
        </div>
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'clinics[]','title' => 'Клиники<span class="req">*</span>',
                     'route' => 'admin.preload.clinics','multiple' => true, 'default' => ['val' => '', 'text' => '']])
        </div>
        <div class="col-lg-12">
            @include('components.ajax-select', ['name' => 'specializations[]','title' => 'Специализации<span class="req">*</span>',
                     'route' => 'admin.preload.specializations','multiple' => true, 'default' => ['val' => '', 'text' => '']])
        </div>
    </div>
@endsection
