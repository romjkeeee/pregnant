@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.article-category.edit', $instance->id))
@section('form-action', route('admin.article-category.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.article-category.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку категорий</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        @include('components.multi-lang', ['fields' => [
               ['title' => 'Название <span class="req">*</span>', 'name' => 'title'],
       ]])
    </div>
@endsection
