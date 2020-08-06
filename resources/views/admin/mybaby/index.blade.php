@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.mybaby.index'))
@section('header-btn')
    <a href="{{ route('admin.mybaby.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Название</th>
    <th data-toggle="true">Предпоказ</th>
    <th data-toggle="true">Неделя</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">{{ $item->translate->title ?? null }}</td>
            <td class="footable-visible">
                @if($item->preview)
                    <img src="{{ asset($item->preview) }}" height="100px">
                @endif
            </td>
            <td class="footable-visible">{{ $item->week ?? null }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.mybaby.edit', $item->id), 'delete' => $item->id])
            </td>
        </tr>
    @endforeach
@endsection
