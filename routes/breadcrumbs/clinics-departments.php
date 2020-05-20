<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.clinics.departments.index', function ($trail) {
    $trail->parent('admin.clinics.index');
    $trail->push('Отделения', route('admin.clinics.departments.index'));
});

Breadcrumbs::for('admin.clinics.departments.create', function ($trail) {
    $trail->parent('admin.clinics.departments.index');
    $trail->push('Добавление отделения', route('admin.clinics.departments.create'));
});

Breadcrumbs::for('admin.clinics.departments.edit', function ($trail, $id) {
    $trail->parent('admin.clinics.departments.index');
    $trail->push('Редактированние отделения', route('admin.clinics.departments.edit', $id));
});

