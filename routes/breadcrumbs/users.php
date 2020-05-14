<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Пользователи', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.edit', function ($trail, $id) {
    $trail->parent('admin.home');
    $trail->push('Редактированние пользователя', route('admin.users.edit', $id));
});

