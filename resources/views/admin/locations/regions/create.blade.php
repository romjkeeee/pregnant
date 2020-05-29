@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.regions.create'))
@section('form-action', route('admin.regions.store'))
@section('header-btn')
    <a href="{{ route('admin.regions.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку регионов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        @include('components.multi-lang', ['fields' => [
               ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
        ]])
    </div>
@endsection
