@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.orders.create'))
@section('form-action', route('admin.orders.store'))
@section('header-btn')
    <a href="{{ route('admin.orders.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку приказов</a>
@endsection
@section('fields')
    @method('POST')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Номер приказа <span class="req">*</span></strong>
                <input type="text" name="id_order" value="{{ old('id_order') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Название приказа <span class="req">*</span></strong>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Дата приказа <span class="req">*</span></strong>
                <input type="date" name="date" value="{{ old('date') }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-12">

            <div class="form-group" style="padding: 5px">
                <strong style="margin-bottom: 10px!important;">Текст приказа <span class="req">*</span></strong>
                <textarea name="text" id="text" value="{{ old('text') }}" class="form-control" rows="5"></textarea>
            </div>
        </div>
    </div>
@endsection
