@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.slider.create'))
@section('form-action', route('admin.slider.store'))
@section('header-btn')
    <a href="{{ route('admin.slider.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку картинок</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Картинка <span class="req">*</span></strong>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection


