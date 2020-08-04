@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.mybaby.edit', $instance->id))
@section('form-action', route('admin.mybaby.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.mybaby.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку статей</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-12" style="display: none">
            @include('components.ajax-select', ['name' => 'category_id','title' => 'Категории<span class="req">*</span>',
                     'route' => 'admin.preload.article-category', 'default' => ['val' => 5, 'text' => 'Мой ребенок']])
        </div>
        @include('components.multi-lang', ['fields' => [
             ['title' => 'Название <span class="req">*</span>', 'name' => 'title'],
             ['title' => 'Текст статьи <span class="req">*</span>', 'name' => 'text', 'tag' => 'textarea']
        ]])
    </div>
@endsection
