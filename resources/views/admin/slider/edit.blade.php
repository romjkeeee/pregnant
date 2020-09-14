@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.slider.edit', $instance->id))
@section('form-action', route('admin.slider.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.slider.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку картинок</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Картинка <span class="req">*</span></strong>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
