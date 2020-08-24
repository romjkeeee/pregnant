<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.chat.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Список чатов', route('admin.chat.index'));
});

Breadcrumbs::for('admin.chat.edit', function ($trail, $id) {
    $trail->parent('admin.chat.index');
    $trail->push('Просмотр чата', route('admin.chat.edit', $id));
});
