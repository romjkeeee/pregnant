@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.regions.edit', $instance->id))
@section('form-action', route('admin.regions.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.regions.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку регионов</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        @include('components.multi-lang', ['fields' => [
               ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
        ]])
    </div>
@endsection
