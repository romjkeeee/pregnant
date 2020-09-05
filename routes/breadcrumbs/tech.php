<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.tech.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Тех. поддержка', route('admin.tech.index'));
});
Breadcrumbs::for('admin.tech.edit', function ($trail, $id) {
    $trail->parent('admin.tech.index');
    $trail->push('Просмотр запроса', route('admin.tech.edit', $id));
});

