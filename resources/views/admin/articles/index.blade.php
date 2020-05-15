@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.article.index'))
@section('header-btn')
    <a href="{{ route('admin.article.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Категория</th>
    <th data-toggle="true">title</th>
    <th data-toggle="true">preview</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">{{ $item->category_id }}</td>
            <td class="footable-visible">{{ $item->title }}</td>
            <td class="footable-visible">{{ $item->preview }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.article.edit', $item->id)])
            </td>
        </tr>
    @endforeach
@endsection
