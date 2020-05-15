<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.clinic-departments.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Клиники', route('admin.clinic-departments.index'));
});

Breadcrumbs::for('admin.clinic-departments.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Добавление клиники', route('admin.clinic-departments.create'));
});

Breadcrumbs::for('admin.clinic-departments.edit', function ($trail, $id) {
    $trail->parent('admin.home');
    $trail->push('Редактированние клиники', route('admin.clinic-departments.edit', $id));
});

