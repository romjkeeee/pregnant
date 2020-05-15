@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.article-category.edit', $instance->id))
@section('form-action', route('admin.article-category.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.article-category.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку категорий</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Наименование <span class="req">*</span></strong>
                <input type="text" name="title" value="{{ old('title', $instance->title) }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
