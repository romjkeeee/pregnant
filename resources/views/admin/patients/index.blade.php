@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.patients.index'))
@section('header-btn')
    <a href="{{ route('admin.patients.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Пользователь</th>
    <th data-toggle="true">Клиника</th>
    <th data-toggle="true">Доктор</th>
    <th data-toggle="true">Беременна</th>
    <th data-toggle="true">Дата рождения</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">
                @if($item->user)
                    <a href="{{ route('admin.users.edit', $item->user->id) }}">{{ $item->user->fullName }}</a>
                @endif
            </td>
            <td class="footable-visible">
                @if($item->clinic)
                    <a href="{{ route('admin.users.edit', $item->clinic->id) }}">{{ $item->clinic->name }}</a>
                @endif
            </td>
            <td class="footable-visible">
                @if($item->doctor && $item->doctor->user)
                    <a href="{{ route('admin.doctors.edit', $item->doctor->id) }}">{{ $item->doctor->user->name }}</a>
                @endif
            </td>
            <td class="footable-visible">@include('components.status', ['status' => $item->pregnant])</td>
            <td class="footable-visible">{{ $item->date_of_birth ? $item->date_of_birth->format('d.m.Y г.') : '~' }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.patients.edit', $item->id)])
            </td>
        </tr>
    @endforeach
@endsection
