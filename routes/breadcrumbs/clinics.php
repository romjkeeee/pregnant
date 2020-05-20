<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.clinics.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Клиники', route('admin.clinics.index'));
});

Breadcrumbs::for('admin.clinics.create', function ($trail) {
    $trail->parent('admin.clinics.index');
    $trail->push('Добавление клиники', route('admin.clinics.create'));
});

Breadcrumbs::for('admin.clinics.edit', function ($trail, $id) {
    $trail->parent('admin.clinics.index');
    $trail->push('Редактированние клиники', route('admin.clinics.edit', $id));
});

