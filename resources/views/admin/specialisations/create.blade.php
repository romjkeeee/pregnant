@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.specialisations.create'))
@section('form-action', route('admin.specialisations.store'))
@section('header-btn')
    <a href="{{ route('admin.specialisations.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку специализаций</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        @include('components.multi-lang', ['fields' => [
                ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
        ]])
    </div>
@endsection
