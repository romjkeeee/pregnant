<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.check-lists.tasks.index', function ($trail) {
    $trail->parent('admin.check-lists.index');
    $trail->push('Таски чек листа', route('admin.check-lists.tasks.index'));
});

Breadcrumbs::for('admin.check-lists.tasks.create', function ($trail) {
    $trail->parent('admin.check-lists.tasks.index');
    $trail->push('Добавление таска чек листа', route('admin.check-lists.tasks.create'));
});

Breadcrumbs::for('admin.check-lists.tasks.edit', function ($trail, $id) {
    $trail->parent('admin.check-lists.tasks.index');
    $trail->push('Редактированние таска чек листа', route('admin.check-lists.tasks.edit', $id));
});

