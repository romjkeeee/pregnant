<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.patients.weights.index', function ($trail) {
    $trail->parent('admin.patients.index');
    $trail->push('Замеры веса', route('admin.patients.weights.index'));
});

Breadcrumbs::for('admin.patients.weights.create', function ($trail) {
    $trail->parent('admin.patients.weights.index');
    $trail->push('Добавление замеры веса', route('admin.patients.weights.create'));
});

Breadcrumbs::for('admin.patients.weights.edit', function ($trail, $id) {
    $trail->parent('admin.patients.weights.index');
    $trail->push('Редактированние замеры веса', route('admin.patients.weights.edit', $id));
});


