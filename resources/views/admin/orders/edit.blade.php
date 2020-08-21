@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.orders.edit', $instance->id))
@section('form-action', route('admin.orders.update', $instance->id))
@section('header-btn')
    <a href="{{ route('admin.orders.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку приказов</a>
@endsection
@section('fields')
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Номер приказа <span class="req">*</span></strong>
                <input type="text" name="id_order" value="{{ old('id_order', $instance->id_order) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название приказа <span class="req">*</span></strong>
                <input type="text" name="title" value="{{ old('title', $instance->title) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Дата приказа <span class="req">*</span></strong>
                <input type="date" name="date" value="{{ old('date', $instance->date) }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Текст приказа <span class="req">*</span></strong>
                <textarea name="text" id="text" class="form-control" rows="5">{{ old('text', $instance->text) }}</textarea>
            </div>
        </div>
    </div>
@endsection
