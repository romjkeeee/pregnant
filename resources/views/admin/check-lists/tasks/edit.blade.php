@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.check-lists.tasks.edit', $instance->id))
@section('form-action', route('admin.check-lists.tasks.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.check-lists.tasks.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку тасков</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            @include('components.ajax-select', ['name' => 'list_id','title' => 'Группа<span class="req">*</span>',
                     'route' => 'admin.preload.check-list', 'default' => ['val' => $instance->list_id, 'text' => $instance->list->translate->name ?? null]])
        </div>
        @include('components.multi-lang', ['fields' => [
               ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
        ]])
    </div>
@endsection
