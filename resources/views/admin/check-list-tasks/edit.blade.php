@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.check-list-tasks.edit', $instance->id))
@section('form-action', route('admin.check-list-tasks.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.check-list-tasks.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку тасков</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            @include('components.ajax-select', ['name' => 'list_id','title' => 'Группа<span class="req">*</span>',
                     'route' => 'admin.preload.check-list', 'default' => ['val' => $instance->list_id, 'text' => $instance->list->name ?? null]])
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" name="name" value="{{ old('name', $instance->name) }}" class="form-control">
            </div>
        </div>
    </div>
@endsection
