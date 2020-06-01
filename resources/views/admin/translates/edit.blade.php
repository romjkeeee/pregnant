@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.translates.edit', $instance->id))
@section('form-action', route('admin.translates.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.translates.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку переводов</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Ключ <span class="req">*</span></strong>
                <input type="text" name="key" value="{{ old('key', $instance->key) }}" class="form-control">
            </div>
        </div>
        @include('components.multi-lang', ['fields' => [
                ['title' => 'Текст <span class="req">*</span>', 'name' => 'text', 'tag' => 'textarea']
        ]])
    </div>
@endsection
