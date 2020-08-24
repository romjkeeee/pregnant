@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.chat.index'))
{{--@section('header-btn')
    <a href="{{ route('admin.chat.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection--}}
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Отправитель</th>
    <th data-toggle="true">Получатель</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">
                <a href="{{ route('admin.users.edit', $item->sender->id) }}">{{ $item->sender->name }} {{ $item->sender->last_name }}</a>
            </td>
            <td class="footable-visible">
                <a href="{{ route('admin.users.edit', $item->recepient->id) }}">{{ $item->recepient->name }} {{ $item->recepient->last_name }}</a>
            </td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['visible' => route('admin.chat.edit', $item->id), 'delete' => $item->id])
            </td>
        </tr>
    @endforeach
@endsection
