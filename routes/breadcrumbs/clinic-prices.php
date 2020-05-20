<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.clinics.prices.index', function ($trail) {
    $trail->parent('admin.clinics.index');
    $trail->push('Цены', route('admin.clinics.prices.index'));
});

Breadcrumbs::for('admin.clinics.prices.create', function ($trail) {
    $trail->parent('admin.clinics.prices.index');
    $trail->push('Добавление цены', route('admin.clinics.prices.create'));
});

Breadcrumbs::for('admin.clinics.prices.edit', function ($trail, $id) {
    $trail->parent('admin.clinics.prices.index');
    $trail->push('Редактированние цены', route('admin.clinics.prices.edit', $id));
});

