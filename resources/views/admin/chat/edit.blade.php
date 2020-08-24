@extends('layouts.admin.store')
@section('breadcrumbs', Breadcrumbs::render('admin.chat.edit', $chat->id))
@section('header-btn')
    <a href="{{ route('admin.chat.index') }}" class="btn btn-danger" style="margin-top: 30px;">К списку чатов</a>
@endsection
@section('fields')
    <div class="row">
        @forelse($items as $item)
            <div class="col-lg-12" style="margin-top: 15px;">
                <div class="msg" @if($chat->sender_id == $item->user->id) style="float: right; text-align: right" @else style="float: left" @endif>
                    <h5>
                        <a href="{{ route('admin.users.edit', $item->user->id) }}">{{ $item->user->name ." ". $item->user->last_name }}</a>
                    </h5>
                    <h5>Время отправки:</h5>
                    <p>{{ $item->text }}</p>
                    <h5>Время отправки:</h5>
                    <p>{{ $item->send_at }}</p>
                    <p>@if($item->visible === 0) Не прочитано @else Прочитано @endif</p>
                </div>
            </div>
        @empty
            <div class="col-lg-12">
                <h3>Здесь еще не было сообщений!</h3>
            </div>
        @endforelse
    </div>
    <style>
        .ibox-footer{
            display: none;
        }
    </style>
@endsection

