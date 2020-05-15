@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.check-lists.edit', $instance->id))
@section('form-action', route('admin.check-lists.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.check-lists.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку групп</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name', $instance->name) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Изображение <span class="req">*</span></strong>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">
            @if($instance->image)
                <div class="bg-image" style="background-image: url('{{ asset($instance->image) }}'); height: 200px;margin-left: 5px"></div>
            @endif
        </div>
    </div>
@endsection
