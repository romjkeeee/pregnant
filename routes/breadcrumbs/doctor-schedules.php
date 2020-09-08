<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.doctors.schedules.index', function ($trail) {
    $trail->parent('admin.doctors.index');
    $trail->push('График работы', route('admin.doctors.schedules.index'));
});

Breadcrumbs::for('admin.doctors.schedules.create', function ($trail) {
    $trail->parent('admin.doctors.schedules.index');
    $trail->push('Добавление графика', route('admin.doctors.schedules.create'));
});

Breadcrumbs::for('admin.doctors.schedules.edit', function ($trail, $id) {
    $trail->parent('admin.doctors.schedules.index');
    $trail->push('Редактированние графика', route('admin.doctors.schedules.edit', $id));
});

