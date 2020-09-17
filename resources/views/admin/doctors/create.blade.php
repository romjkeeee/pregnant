@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.create'))
@section('form-action', route('admin.doctors.store'))
@section('header-btn')
    <a href="{{ route('admin.doctors.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку докторов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-12">
            @include('components.ajax-select', ['name' => 'user_id','title' => 'Пользователь<span class="req">*</span>',
                     'route' => 'admin.preload.users', 'default' => ['val' => '', 'text' => '']])
        </div>
        <div class="col-lg-12">
            @include('components.ajax-select', ['name' => 'clinics[]','title' => 'Клиники<span class="req">*</span>',
                     'route' => 'admin.preload.clinics','multiple' => true, 'default' => ['val' => '', 'text' => '']])
        </div>
        <div class="col-lg-12">
            @include('components.ajax-select', ['name' => 'specializations[]','title' => 'Специализации<span class="req">*</span>',
                     'route' => 'admin.preload.specializations','multiple' => true, 'default' => ['val' => '', 'text' => '']])
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Стаж работы</strong>
                <input type="text" name="experience" value="{{ old('experience') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-inline" style="margin-top: 30px; margin-left: 10px">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" @if(old('is_admin')) checked @endif value="1" name="is_admin">
                <label class="form-check-label" for="inlineCheckbox1">Администратор больницы?</label>
            </div>
        </div>
    </div>
@endsection
