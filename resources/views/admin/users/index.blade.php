@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.users.index'))
@section('header-btn')
    <a href="{{ route('admin.users.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Подтвержден</th>
    <th data-toggle="true">Роль</th>
    <th data-toggle="true">Имя</th>
    <th data-toggle="true">Телефон</th>
    <th data-toggle="true">Почта</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">@include('components.status', ['status' => $item->verified])</td>
            <td class="footable-visible">{{ $item->role }}</td>
            <td class="footable-visible">{{ $item->name }}</td>
            <td class="footable-visible">{{ $item->phone }}</td>
            <td class="footable-visible">{{ $item->email }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.users.edit', $item->id), 'delete' => $item->id])
            </td>
        </tr>
    @endforeach
@endsection
