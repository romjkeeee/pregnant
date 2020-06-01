@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.schedules.edit', $instance->id))
@section('form-action', route('admin.clinics.schedules.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.clinics.schedules.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку графиков</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        @foreach(trans('date.days') as $key => $day)
            <div class="col-lg-1">
                {{ $day }}
                <input type="number" name="form[{{ $key }}][day]" value="{{ $key }}" hidden>
            </div>
            <div class="col-lg-2">
                <div class="form-group" style="margin-bottom: 0">
                    <input type="time" name="form[{{ $key }}][start]" class="form-control"
                           value='{{ $instance->schedules->where('day', $key)->first()->start ?? old("form")[$key]['start'] ?? null }}'>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group" style="margin-bottom: 0">
                    <input type="time" name="form[{{ $key }}][end]" class="form-control"
                           value='{{ $instance->schedules->where('day', $key)->first()->end ?? old("form")[$key]['end'] ?? null }}'>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hr-line-dashed"></div>
            </div>
        @endforeach
    </div>
@endsection
