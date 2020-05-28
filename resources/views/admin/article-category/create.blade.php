@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.article-category.create'))
@section('form-action', route('admin.article-category.store'))
@section('header-btn')
    <a href="{{ route('admin.article-category.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку категорий</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        @include('components.multi-lang', ['fields' => [
                ['title' => 'Название <span class="req">*</span>', 'name' => 'title'],
        ]])
    </div>
@endsection
