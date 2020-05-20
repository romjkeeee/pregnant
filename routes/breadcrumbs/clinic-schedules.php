<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.schedules.index', function ($trail) {
    $trail->parent('admin.clinics.index');
    $trail->push('График работы', route('admin.schedules.index'));
});

Breadcrumbs::for('admin.schedules.create', function ($trail) {
    $trail->parent('admin.schedules.index');
    $trail->push('Добавление графика', route('admin.schedules.create'));
});

Breadcrumbs::for('admin.schedules.edit', function ($trail, $id) {
    $trail->parent('admin.schedules.index');
    $trail->push('Редактированние графика', route('admin.schedules.edit', $id));
});

