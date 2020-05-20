<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.clinics.schedules.index', function ($trail) {
    $trail->parent('admin.clinics.index');
    $trail->push('График работы', route('admin.clinics.schedules.index'));
});

Breadcrumbs::for('admin.clinics.schedules.create', function ($trail) {
    $trail->parent('admin.clinics.schedules.index');
    $trail->push('Добавление графика', route('admin.clinics.schedules.create'));
});

Breadcrumbs::for('admin.clinics.schedules.edit', function ($trail, $id) {
    $trail->parent('admin.clinics.schedules.index');
    $trail->push('Редактированние графика', route('admin.clinics.schedules.edit', $id));
});

