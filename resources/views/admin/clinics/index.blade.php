@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.index'))
@section('header-btn')
    <a href="{{ route('admin.clinics.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Название</th>
    <th data-toggle="true">Тип</th>
    <th data-toggle="true">Регион</th>
    <th data-toggle="true">Город</th>
    <th data-toggle="true">Адрес</th>
    <th data-toggle="true">Рейтинг</th>
    <th data-toggle="true">Отделений(шт)</th>
    <th data-toggle="true">Прайс лист(шт)</th>
    <th data-toggle="true">График</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">{{ $item->name }}</td>
            <td class="footable-visible">{{ $item->type }}</td>
            <td class="footable-visible">{{ $item->region->translate->name ?? null }}</td>
            <td class="footable-visible">{{ $item->city->translate->name ?? null }}</td>
            <td class="footable-visible">{{ $item->address }}</td>
            <td class="footable-visible">{{ $item->rate ?? 5 }}({{ $item->reviews->count() }})</td>
            <td class="footable-visible">{{ $item->departments->count() }}</td>
            <td class="footable-visible">{{ $item->prices->count() }}</td>
            <td class="footable-visible">@include('components.status', ['status' => !!$item->schedules->count()])</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.clinics.edit', $item->id), 'delete' => $item->id])
            </td>
        </tr>
    @endforeach
@endsection
