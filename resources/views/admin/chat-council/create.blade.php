@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.chat-council.create'))
@section('form-action', route('admin.chat-council.store'))
@section('header-btn')
    <a href="{{ route('admin.chat-council.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку консилиумов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название <span class="req">*</span></strong>
                <input type="text" value="{{ old('group_title') }}" name="title" class="form-control">
            </div>
        </div>
        <input type="hidden" name="type" value="1">
        <div class="col-lg-6">
            @include('components.ajax-select', ['name' => 'users[]','title' => 'Учасники консилиума<span class="req">*</span>',
                     'route' => 'admin.preload.users','multiple' => true, /*'default' => ['val' => $instance->selectedSpecialisations]*/])
        </div>

    </div>
@endsection


