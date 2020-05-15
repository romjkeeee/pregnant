@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.clinic-departments.index'))
@section('header-btn')
    <a href="{{ route('admin.clinic-departments.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Клиника</th>
    <th data-toggle="true">Название</th>
    <th data-toggle="true">улица</th>
    <th data-toggle="true">дом</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">{{ $item->clinic->name ?? null }}</td>
            <td class="footable-visible">{{ $item->name }}</td>
            <td class="footable-visible">{{ $item->street }}</td>
            <td class="footable-visible">{{ $item->building }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.clinic-departments.edit', $item->id)])
            </td>
        </tr>
    @endforeach
@endsection
