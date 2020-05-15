<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.doctors.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Доктора', route('admin.doctors.index'));
});

Breadcrumbs::for('admin.doctors.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Добавление доктора', route('admin.doctors.create'));
});

Breadcrumbs::for('admin.doctors.edit', function ($trail, $id) {
    $trail->parent('admin.home');
    $trail->push('Редактированние доктора', route('admin.doctors.edit', $id));
});

