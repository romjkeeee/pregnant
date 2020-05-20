<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.check-lists.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Чек листы', route('admin.check-lists.index'));
});

Breadcrumbs::for('admin.check-lists.create', function ($trail) {
    $trail->parent('admin.check-lists.index');
    $trail->push('Добавление чек листа', route('admin.check-lists.create'));
});

Breadcrumbs::for('admin.check-lists.edit', function ($trail, $id) {
    $trail->parent('admin.check-lists.index');
    $trail->push('Редактированние чек листа', route('admin.check-lists.edit', $id));
});

