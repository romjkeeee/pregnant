<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.check-list-tasks.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Таски чек листа', route('admin.check-list-tasks.index'));
});

Breadcrumbs::for('admin.check-list-tasks.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Добавление таска чек листа', route('admin.check-list-tasks.create'));
});

Breadcrumbs::for('admin.check-list-tasks.edit', function ($trail, $id) {
    $trail->parent('admin.home');
    $trail->push('Редактированние таска чек листа', route('admin.check-list-tasks.edit', $id));
});

