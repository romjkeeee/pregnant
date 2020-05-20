@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.clinics.departments.index'))
@section('header-btn')
    <div style="display: flex; justify-content: flex-end; align-items: center">
        <form id="list" style="margin-top: 30px">
            @include('components.ajax-select', ['name' => 'clinic_id', 'submit' => 'list', 'placeholder' => 'Выберите клинику',
             'route' => 'admin.preload.clinics', 'default' => ['val' => $clinic->id ?? null, 'text' => $clinic->name ?? null]])
        </form>
        @if($clinic)
            <form style="margin-top: 15px">
                <input hidden name="clinic_id" value="">
                <button type="submit" class="btn btn-warning" style="height: 34px"><i class="fa fa-close"></i></button>
            </form>
        @endif
        <a href="{{ route('admin.clinics.departments.create') }}" class="btn btn-danger" style="margin-top: 15px; margin-left: 10px;">Добавить</a>
    </div>
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
            <td class="footable-visible">
                @if($item->clinic)
                    <a href="{{ route('admin.clinics.edit', $item->clinic_id) }}">{{ $item->clinic->name }}</a>
                @endif
            </td>
            <td class="footable-visible">{{ $item->name }}</td>
            <td class="footable-visible">{{ $item->street }}</td>
            <td class="footable-visible">{{ $item->building }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.clinics.departments.edit', $item->id)])
            </td>
        </tr>
    @endforeach
@endsection
