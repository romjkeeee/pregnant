<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.prices.index', function ($trail) {
    $trail->parent('admin.clinics.index');
    $trail->push('Цены', route('admin.prices.index'));
});

Breadcrumbs::for('admin.prices.create', function ($trail) {
    $trail->parent('admin.prices.index');
    $trail->push('Добавление цены', route('admin.prices.create'));
});

Breadcrumbs::for('admin.prices.edit', function ($trail, $id) {
    $trail->parent('admin.prices.index');
    $trail->push('Редактированние цены', route('admin.prices.edit', $id));
});

