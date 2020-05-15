@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.langs.index'))
{{--@section('header-btn')--}}
{{--    <a href="{{ route('admin_med_add') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>--}}
{{--@endsection--}}
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Код</th>
    <th data-toggle="true">Наименование</th>
    <th data-toggle="true">Файл</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">{{ $item->code }}</td>
            <td class="footable-visible">{{ $item->name }}</td>
            <td class="footable-visible">{{ $item->file }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.langs.edit', $item->id)])
            </td>
        </tr>
    @endforeach
@endsection
