@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.reviews.edit', $instance->id))
@section('form-action', route('admin.doctors.reviews.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.doctors.reviews.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку отзывов</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-3">
            <strong style="margin-bottom: 10px!important;">Доктор <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'doctor_id', 'placeholder' => 'Выберите доктора',
            'route' => 'admin.preload.doctors', 'default' => ['val' => $instance->doctor->id ?? null, 'text' => $instance->doctor->user->fullName ?? null]])
        </div>
        <div class="col-lg-3">
            <strong style="margin-bottom: 10px!important;">Пользователь <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'user_id', 'placeholder' => 'Выберите пользователя',
            'route' => 'admin.preload.users', 'default' => ['val' => $instance->user->id ?? null, 'text' => $instance->user->fullName ?? null]])
        </div>
        <div class="col-lg-3">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Оценка <span class="req">*</span></strong>
                <input type="number" step="0.1" name="rate" value="{{ old('rate', $instance->rate) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <strong style="margin-bottom: 10px!important;">Статус отзыва <span class="req">*</span></strong>
                <select name="check" id="check" class="form-control">
                    <option value="1" @if($instance->check) selected @endif>Проверен</option>
                    <option value="0" @if(!$instance->check) selected @endif>Не проверен</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Текст <span class="req">*</span></strong>
                <input type="text" name="text" value="{{ old('text', $instance->text) }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
