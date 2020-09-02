@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.check-lists.tasks.index'))
@section('header-btn')
    <div style="display: flex; justify-content: flex-end; align-items: center">
        <form id="list">
            @include('components.ajax-select', ['name' => 'list_id', 'submit' => 'list', 'placeholder' => 'Выберите группу',
             'route' => 'admin.preload.check-list', 'default' => ['val' => $list->id ?? null, 'text' => $list->translate->name ?? null]])
        </form>
        @if($list)
            <form style="margin-top: 30px">
                <input hidden name="list_id" value="">
                <button type="submit" class="btn btn-warning" style="height: 34px"><i class="fa fa-close"></i></button>
            </form>
        @endif
        <a href="{{ route('admin.check-lists.tasks.create') }}" class="btn btn-danger" style="margin-top: 30px; margin-left: 10px;">Добавить</a>
    </div>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Название</th>
    <th data-toggle="true">Группа</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">{{ $item->translate->name ?? null }}</td>
            <td class="footable-visible">{{ $item->list->translate->name ?? null }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.articles.edit', $item->id), 'delete' => $item->id])
            </td>
        </tr>
    @endforeach
@endsection

@push('styles')
    <style>
        .form-group {
            margin-top: 30px;
            margin-bottom: 0 !important;
            padding: 0 !important;
        }
    </style>
@endpush
