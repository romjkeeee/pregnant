@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.regions.index'))
@section('header-btn')
    <a href="{{ route('admin.regions.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Название</th>
    <th data-toggle="true">Города</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">{{ $item->name }}</td>
            <td class="footable-visible"><a href="{{ route('admin.cities.index', ['region_id' => $item->id]) }}" class="btn btn-sm btn-primary">Перейти к городам региона {{ $item->name }}</a></td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.regions.edit', $item->id), 'delete' => $item->id])
            </td>
        </tr>
    @endforeach
@endsection
