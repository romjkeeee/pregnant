@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.schedules.index'))
@section('header-btn')
    <div style="display: flex; justify-content: flex-end; align-items: center">
        <form id="list" style="margin-top: 30px">
            @include('components.ajax-select', ['name' => 'doctor_id', 'submit' => 'list', 'placeholder' => 'Выберите доктора',
             'route' => 'admin.preload.doctors', 'default' => ['val' => $doctor->id ?? null, 'text' => $doctor->translate->name ?? null]])
        </form>
        @if($doctor)
            <form style="margin-top: 15px">
                <input hidden name="doctor_id" value="">
                <button type="submit" class="btn btn-warning" style="height: 34px"><i class="fa fa-close"></i></button>
            </form>
        @endif
        <a href="{{ route('admin.doctors.schedules.create') }}" class="btn btn-danger" style="margin-top: 15px; margin-left: 10px;">Добавить</a>
    </div>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Доктор</th>
    <th data-toggle="true">График</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">
                <a href="{{ route('admin.doctors.edit', $item->id) }}">{{ $item->user->name.' '.$item->user->last_name  ?? 'Не указано' }}</a>
            </td>
            <td class="footable-visible">
                <table>
                    @foreach($item->fullSchedules as $schedule)
                        <tr>
                            <td><span style="margin-right: 5px">{{$schedule['day']}}:</span></td>
                            <td><strong style="margin-left: 5px">{{$schedule['period']}}</td>
                        </tr>
                    @endforeach
                </table>

            </td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.doctors.schedules.edit', $item->id)])
            </td>
        </tr>
    @endforeach
@endsection
