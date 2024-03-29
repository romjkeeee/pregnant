@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.languages.create'))
@section('form-action', route('admin.languages.store'))
@section('header-btn')
    <a href="{{ route('admin.languages.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку языков</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Код <span class="req">*</span></strong>
                <input type="text" name="code" value="{{ old('code') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Наименование <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Файл <span class="req">*</span></strong>
                <input type="text" name="file" value="{{ old('file') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
