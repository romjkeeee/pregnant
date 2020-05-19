@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.regions.edit', $instance->id))
@section('form-action', route('admin.regions.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.regions.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку регионов</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name', $instance->name) }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
