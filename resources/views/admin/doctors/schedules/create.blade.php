@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.schedules.create'))
@section('form-action', route('admin.doctors.schedules.store'))
@section('header-btn')
    <a href="{{ route('admin.doctors.schedules.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку рассписаний</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-1">
            <strong style="margin-bottom: 10px!important;margin-left: 10px">Доктор <span class="req">*</span></strong>
        </div>
        <div class="col-lg-4">
            @include('components.ajax-select', ['name' => 'doctor_id', 'submit' => 'list', 'placeholder' => 'Выберите доктора',
                     'route' => 'admin.preload.doctors', 'default' => ['val' => $instance->id ?? null, 'text' => $instance->name ?? null]])
        </div>
        <div class="col-lg-12">
            <div class="hr-line-dashed"></div>
        </div>
        @foreach(trans('date.days') as $key => $day)
            <div class="col-lg-1">
                {{ $day }}
                <input type="number" name="form[{{ $key }}][day]" value="{{ $key }}" hidden>
            </div>
            <div class="col-lg-2">
                <div class="form-group" style="margin-bottom: 0">
                    <input type="time" name="form[{{ $key }}][start]" value='{{ old("form")[$key]['start'] ?? null }}' class="form-control">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group" style="margin-bottom: 0">
                    <input type="time" name="form[{{ $key }}][end]" value='{{ old("form")[$key]['end'] ?? null }}' class="form-control">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hr-line-dashed"></div>
            </div>
        @endforeach
    </div>
@endsection
