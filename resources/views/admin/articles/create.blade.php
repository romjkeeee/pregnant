@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.article-category.create'))
@section('form-action', route('admin.article-category.store'))
@section('header-btn')
    <a href="{{ route('admin.article-category.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку статей</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'category_id','title' => 'Категория<span class="req">*</span>', 'route' => 'admin.preload.article-category'])
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Наименование <span class="req">*</span></strong>
                <input type="text" name="text" value="{{ old('text') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Предпоказ <span class="req">*</span></strong>
                <input type="file" name="preview" value="{{ old('preview') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Картинка <span class="req">*</span></strong>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
