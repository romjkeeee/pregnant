@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.article-category.create'))
@section('form-action', route('admin.article-category.store'))
@section('header-btn')
    <a href="{{ route('admin.article-category.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку категорий</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Наименование <span class="req">*</span></strong>
                <input type="text" name="phone" value="{{ old('title') }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
