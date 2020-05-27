@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.articles.edit', $instance->id))
@section('form-action', route('admin.articles.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.articles.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку статей</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            @include('components.ajax-select', ['name' => 'category_id','title' => 'Категории<span class="req">*</span>',
                     'route' => 'admin.preload.article-category', 'default' => ['val' => $instance->category_id, 'text' => $instance->category->title ?? null]])
        </div>
        @include('components.multi-lang', ['fields' => [
             ['title' => 'Название <span class="req">*</span>', 'name' => 'title'],
             ['title' => 'Описание <span class="req">*</span>', 'name' => 'text']
        ]])
    </div>
@endsection
