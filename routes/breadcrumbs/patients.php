<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.patients.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Пациенты', route('admin.patients.index'));
});

Breadcrumbs::for('admin.patients.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Добавление пациента', route('admin.patients.create'));
});

Breadcrumbs::for('admin.patients.edit', function ($trail, $id) {
    $trail->parent('admin.home');
    $trail->push('Редактированние пациента', route('admin.patients.edit', $id));
});

