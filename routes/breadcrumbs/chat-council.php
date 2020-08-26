<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.chat-council.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Список консилиумов', route('admin.chat-council.index'));
});

Breadcrumbs::for('admin.chat-council.create', function ($trail) {
    $trail->parent('admin.chat-council.index');
    $trail->push('Созддание консилиума', route('admin.chat-council.create'));
});

Breadcrumbs::for('admin.chat-council.edit', function ($trail, $id) {
    $trail->parent('admin.chat-council.index');
    $trail->push('Редактирование консилиума', route('admin.chat-council.edit', $id));
});
