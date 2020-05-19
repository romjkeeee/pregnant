@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.cities.index'))
@section('header-btn')
    <div style="display: flex; justify-content: flex-end; align-items: center">
        <form id="list" style="margin-top: 30px">
            @include('components.ajax-select', ['name' => 'region_id', 'submit' => 'list', 'placeholder' => 'Выберите регион',
             'route' => 'admin.preload.regions', 'default' => ['val' => $region->id ?? null, 'text' => $region->name ?? null]])
        </form>
        @if($region)
            <form style="margin-top: 15px">
                <input hidden name="list_id" value="">
                <button type="submit" class="btn btn-warning" style="height: 34px"><i class="fa fa-close"></i></button>
            </form>
        @endif
        <a href="{{ route('admin.cities.create') }}" class="btn btn-danger" style="margin-top: 15px; margin-left: 10px;">Добавить</a>
    </div>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Название</th>
    <th data-toggle="true">Регион</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">{{ $item->name }}</td>
            <td class="footable-visible">
                @if($item->region)
                    <a href="{{ route('admin.regions.edit', $item->region_id) }}">{{ $item->region->name }}</a>
                @endif
            </td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.cities.edit', $item->id)])
            </td>
        </tr>
    @endforeach
@endsection
