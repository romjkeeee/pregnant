@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.reviews.index'))
@section('header-btn')
    <div style="display: flex; justify-content: flex-end; align-items: center">
        <form id="list" style="margin-top: 30px">
            @include('components.ajax-select', ['name' => 'doctor_id', 'submit' => 'list', 'placeholder' => 'Выберите доктора',
             'route' => 'admin.preload.doctors', 'default' => ['val' => $doctor->id ?? null, 'text' => $doctor->name ?? null]])
        </form>
        @if($doctor)
            <form style="margin-top: 15px">
                <input hidden name="clinic_id" value="">
                <button type="submit" class="btn btn-warning" style="height: 34px"><i class="fa fa-close"></i></button>
            </form>
        @endif
        <a href="{{ route('admin.doctors.reviews.create') }}" class="btn btn-danger" style="margin-top: 15px; margin-left: 10px;">Добавить</a>
    </div>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Доктор</th>
    <th data-toggle="true">Пользователь</th>
    <th data-toggle="true">Оценка</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">
                @if($item->doctor)
                    <a href="{{ route('admin.doctors.edit', $item->doctor_id) }}">{{ $item->doctor->user->name ?? null }}</a>
                @endif
            </td>
            <td class="footable-visible">
                @if($item->user)
                    <a href="{{ route('admin.users.edit', $item->user_id) }}">{{ $item->user->fullName }}</a>
                @endif
            </td>
            <td class="footable-visible">{{ $item->rate }}</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.doctors.reviews.edit', $item->id)])
            </td>
        </tr>
    @endforeach
@endsection
