@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.check-lists.tasks.create'))
@section('form-action', route('admin.check-lists.tasks.store'))
@section('header-btn')
    <a href="{{ route('admin.check-lists.tasks.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку тасков</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-12">
            @include('components.ajax-select', ['name' => 'list_id','title' => 'Группа<span class="req">*</span>',
                     'route' => 'admin.preload.check-list', 'default' => ['val' => '', 'text' => '']])
        </div>
        @include('components.multi-lang', ['fields' => [
               ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
        ]])
    </div>
@endsection
