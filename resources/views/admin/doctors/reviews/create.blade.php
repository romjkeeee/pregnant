@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.reviews.create'))
@section('form-action', route('admin.doctors.reviews.store'))
@section('header-btn')
    <a href="{{ route('admin.doctors.reviews.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку отзывов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-4">
            <strong style="margin-bottom: 10px!important;">Доктор <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'doctor_id', 'placeholder' => 'Выберите доктора', 'route' => 'admin.preload.doctors'])
        </div>
        <div class="col-lg-4">
            <strong style="margin-bottom: 10px!important;">Пользователь <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'user_id', 'placeholder' => 'Выберите пользователя', 'route' => 'admin.preload.users'])
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Оценка <span class="req">*</span></strong>
                <input type="number" step="0.1" name="rate" value="{{ old('rate') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Текст <span class="req">*</span></strong>
                <input type="text" name="text" value="{{ old('text') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
