<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.patients.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Пациенты', route('admin.patients.index'));
});

Breadcrumbs::for('admin.patients.create', function ($trail) {
    $trail->parent('admin.patients.index');
    $trail->push('Добавление пациента', route('admin.patients.create'));
});

Breadcrumbs::for('admin.patients.edit', function ($trail, $id) {
    $trail->parent('admin.patients.index');
    $trail->push('Редактированние пациента', route('admin.patients.edit', $id));
});

Breadcrumbs::for('admin.check-list.index', function ($trail, $id) {
    $trail->parent('admin.patients.index');
    $trail->push("Чек лист пациента #{$id}", route('admin.check-list.index', $id));
});


