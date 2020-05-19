<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.regions.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Регионы', route('admin.regions.index'));
});

Breadcrumbs::for('admin.regions.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Добавление региона', route('admin.regions.create'));
});

Breadcrumbs::for('admin.regions.edit', function ($trail, $id) {
    $trail->parent('admin.home');
    $trail->push('Редактированние региона', route('admin.regions.edit', $id));
});

