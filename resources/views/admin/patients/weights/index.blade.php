@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.patients.weights.index'))
@section('header-btn')
    <div style="display: flex; justify-content: flex-end; align-items: center">
        <form id="list" style="margin-top: 30px">
            @include('components.ajax-select', ['name' => 'patient_id', 'submit' => 'list', 'placeholder' => 'Выберите пациента',
             'route' => 'admin.preload.patients', 'default' => ['val' => $patient->id ?? null, 'text' => $patient->user->fullName ?? null]])
        </form>
        @if($patient)
            <form style="margin-top: 15px">
                <input hidden name="patient_id" value="">
                <button type="submit" class="btn btn-warning" style="height: 34px"><i class="fa fa-close"></i></button>
            </form>
        @endif
        <a href="{{ route('admin.patients.weights.create') }}" class="btn btn-danger" style="margin-top: 15px; margin-left: 10px;">Добавить</a>
    </div>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Пациент</th>
    <th data-toggle="true">Вес</th>
    <th data-toggle="true">Дата замера</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">
                @if($item->patient)
                    <a href="{{ route('admin.patients.edit', $item->patient_id) }}">{{ $item->patient->user->fullName ?? null }}</a>
                @endif
            </td>
            <td class="footable-visible">{{ $item->weights ?? null }}</td>
            <td class="footable-visible">{{ $item->date ? $item->date->format('d.m.Y') : null }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.patients.weights.edit', $item->id), 'delete' => $item->id])
            </td>
        </tr>
    @endforeach
@endsection
