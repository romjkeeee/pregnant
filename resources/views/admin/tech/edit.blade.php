@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.chat.edit', $instance->id))
@section('form-action', route('admin.tech.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.chat.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку чатов</a>
@endsection
@section('fields')
    <div class="row">
        <div class="col-lg-12" style="margin-top: 15px;">
            <div class="msg">
                <h5><b>Отправитель:</b> {{ $instance->email }}</h5>
                <h5>Текст сообщения:</h5>
                <textarea class="form-control" style="width: 1200px; height: 300px;">{{ $instance->text }}</textarea>
                <h5>Время отправки:</h5>
                <p>{{ $instance->created_at }}</p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong style="margin-bottom: 10px!important;">Статус отзыва <span class="req">*</span></strong>
                <select name="check" id="check" class="form-control">
                    <option value="1" @if($instance->check) selected @endif>Проверен</option>
                    <option value="0" @if(!$instance->check) selected @endif>Не проверен</option>
                </select>
            </div>
        </div>
    </div>
    @method('PUT')
@endsection

