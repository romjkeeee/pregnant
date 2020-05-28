@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.educations.edit', $instance->id))
@section('form-action', route('admin.doctors.educations.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.doctors.educations.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку образования</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            <strong style="margin-bottom: 10px!important;">Доктор <span class="req">*</span></strong>
            @include('components.ajax-select', ['name' => 'doctor_id', 'placeholder' => 'Выберите доктора',
            'route' => 'admin.preload.doctors', 'default' => ['val' => $instance->doctor->id ?? null, 'text' => $instance->doctor->user->fullName ?? null]])
        </div>
        @include('components.multi-lang', ['fields' => [
           ['title' => 'Название <span class="req">*</span>', 'name' => 'title'],
           ['title' => 'Описание <span class="req">*</span>', 'name' => 'description']
      ]])
    </div>
@endsection
