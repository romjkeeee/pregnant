@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.educations.create'))
@section('form-action', route('admin.doctors.educations.store'))
@section('header-btn')
    <a href="{{ route('admin.doctors.educations.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку образования</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-12">
            <strong style="margin-bottom: 10px!important;">Доктор <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'doctor_id', 'placeholder' => 'Выберите доктора', 'route' => 'admin.preload.doctors'])
        </div>
        @include('components.multi-lang', ['fields' => [
            ['title' => 'Название <span class="req">*</span>', 'name' => 'title'],
            ['title' => 'Описание <span class="req">*</span>', 'name' => 'description']
       ]])
    </div>
@endsection
