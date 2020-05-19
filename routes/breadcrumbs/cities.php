<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.cities.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Города', route('admin.cities.index'));
});

Breadcrumbs::for('admin.cities.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Добавление города', route('admin.cities.create'));
});

Breadcrumbs::for('admin.cities.edit', function ($trail, $id) {
    $trail->parent('admin.home');
    $trail->push('Редактированние города', route('admin.cities.edit', $id));
});

