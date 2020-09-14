@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.districs.edit', $instance->id))
@section('form-action', route('admin.districs.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.districs.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку районов</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            @include('components.ajax-select', ['name' => 'city_id','title' => 'Город<span class="req">*</span>',
                     'route' => 'admin.preload.cities', 'default' => ['val' => $instance->city_id ?? null, 'text' => $instance->city->translate->name ?? null]])
        </div>
        @include('components.multi-lang', ['fields' => [
               ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
        ]])
    </div>
@endsection
