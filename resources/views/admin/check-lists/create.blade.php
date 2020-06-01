@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.check-lists.create'))
@section('form-action', route('admin.check-lists.store'))
@section('header-btn')
    <a href="{{ route('admin.check-lists.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку групп</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Изображение <span class="req">*</span></strong>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        @include('components.multi-lang', ['fields' => [
                ['title' => 'Название <span class="req">*</span>', 'name' => 'name'],
        ]])
    </div>
@endsection
