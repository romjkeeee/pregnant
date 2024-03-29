@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.specialisations.index'))
@section('header-btn')
    <a href="{{ route('admin.specialisations.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Название</th>
    <th data-toggle="true">Картинка</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">{{ $item->translate->name ?? null }}</td>
            <td class="footable-visible">
                @if($item->photo)
                    <img src="{{ asset($item->photo) }}" height="100px">
                @endif
            </td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.specialisations.edit', $item->id), 'delete' => $item->id])
            </td>
        </tr>
    @endforeach
@endsection
