@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.regions.create'))
@section('form-action', route('admin.regions.store'))
@section('header-btn')
    <a href="{{ route('admin.regions.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку регионов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
