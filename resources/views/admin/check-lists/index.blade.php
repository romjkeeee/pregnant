@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.check-lists.index'))
@section('header-btn')
    <a href="{{ route('admin.check-lists.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Изображение</th>
    <th data-toggle="true">Название</th>
    <th data-toggle="true">Тасков</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">
                @if($item->image)
                    <div class="bg-image" style="background-image: url('{{ asset($item->image) }}')"></div>
                @endif
            </td>
            <td class="footable-visible">{{ $item->name }}</td>
            <td class="footable-visible">{{ $item->tasks->count() }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.check-lists.edit', $item->id)])
            </td>
        </tr>
    @endforeach
@endsection
