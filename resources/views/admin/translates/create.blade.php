@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.translates.create'))
@section('form-action', route('admin.translates.store'))
@section('header-btn')
    <a href="{{ route('admin.translates.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку переводов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Ключ <span class="req">*</span></strong>
                <input type="text" name="key" value="{{ old('key') }}" class="form-control">
            </div>
        </div>
        @include('components.multi-lang', ['fields' => [
                ['title' => 'Текст <span class="req">*</span>', 'name' => 'text', 'tag' => 'textarea']
        ]])
    </div>
@endsection


