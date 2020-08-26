<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.chat-forum.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Список форумов', route('admin.chat-forum.index'));
});

Breadcrumbs::for('admin.chat-forum.create', function ($trail) {
    $trail->parent('admin.chat-forum.index');
    $trail->push('Созддание форума', route('admin.chat-forum.create'));
});

Breadcrumbs::for('admin.chat-forum.edit', function ($trail, $id) {
    $trail->parent('admin.chat-forum.index');
    $trail->push('Редактирование форума', route('admin.chat-forum.edit', $id));
});
