<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.orders.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Приказы', route('admin.orders.index'));
});

Breadcrumbs::for('admin.orders.create', function ($trail) {
    $trail->parent('admin.orders.index');
    $trail->push('Добавление приказа', route('admin.orders.create'));
});

Breadcrumbs::for('admin.orders.edit', function ($trail, $id) {
    $trail->parent('admin.orders.index');
    $trail->push('Редактированние приказа', route('admin.orders.edit', $id));
});
