@extends('layouts.admin.table')
@section('breadcrumbs', Breadcrumbs::render('admin.doctors.index'))
@section('header-btn')
    <a href="{{ route('admin.doctors.create') }}" class="btn btn-danger" style="margin-top: 30px;">Добавить</a>
@endsection
@section('table-header')
    <th data-toggle="true">#</th>
    <th data-toggle="true">Пользователь</th>
    <th data-toggle="true">Рейтинг</th>
    <th data-toggle="true">К-ство клиник</th>
    <th data-toggle="true">К-ство специализаций</th>
    <th data-toggle="true">К-ство отзывов</th>
    <th data-toggle="true">Качество</th>
    <th data-toggle="true">Администатор</th>
    <th class="text-right" data-sort-ignore="true">Действия</th>
@endsection
@section('table-body')
    @foreach ($items as $item)
        <tr class="footable-odd">
            <td class="footable-visible">{{ $item->id }}</td>
            <td class="footable-visible">
                @if($item->user)
                    <a href="{{ route('admin.users.edit', $item->user->id) }}">{{ $item->user->fullName }}</a>
                @endif
            </td>
            <td class="footable-visible">{{ $item->rate ?? 5 }}</td>
            <td class="footable-visible">{{ $item->clinics->count() }}</td>
            <td class="footable-visible">{{ $item->specialisations->count() }}</td>
            <td class="footable-visible">{{ $item->reviews->count() }}</td>
            <td class="footable-visible"><span style="color: green; display: inline-block">{{ $item->like }}</span> / <span style="color: red">{{ $item->dislike }}</span></td>
            <td class="footable-visible">@if(old('is_admin', $item->is_admin)) Да @else Нет @endif</td>
            <td class="text-right footable-visible footable-last-column">
                @include('components.action', ['edit' => route('admin.doctors.edit', $item->id), 'delete' => $item->id])
            </td>
        </tr>
    @endforeach
@endsection
