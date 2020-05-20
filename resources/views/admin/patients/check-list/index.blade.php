@extends('layouts.admin.multi-table')
@section('breadcrumbs', Breadcrumbs::render('admin.patients.check-list.index', $patient->id))
@section('header-btn')
    <a href="{{ route('admin.patients.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку пациентов</a>
@endsection
@section('tables')
    <div class="col-lg-12">
        @forelse($items as $list)
            <form action="{{ route('admin.patients.check-list.store', $patient->id) }}" method="post" class="ibox">@csrf
                <div class="ibox-title">
                    <h5>{{ $list->name }}</h5>
                </div>
                <div class="ibox-content">
                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                        <tr>
                            <th data-toggle="true">Таск</th>
                            <th data-toggle="true">Завершен</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($list->tasks as $task)
                            <tr class="footable-odd">
                                <td class="footable-visible">{{ $task->name }}</td>
                                <td class="footable-visible">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="check-{{ $task->id }}" @if($task->selected) checked @endif value="{{ $task->id }}" name="task_id[]">
                                        <label class="form-check-label" for="check-{{ $task->id }}"></label>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="footable-odd">
                                <td colspan="12" class="footable-visible">Список пуст</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="ibox-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Сохранить</button>
                </div>
            </form>
        @empty
            <div class="col-lg-12" style="padding: 10px; display: flex; justify-content: center">Список тасков пуст</div>
        @endforelse
    </div>
@endsection
