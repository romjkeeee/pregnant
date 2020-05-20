<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.patients.bellies.index', function ($trail) {
    $trail->parent('admin.patients.index');
    $trail->push('Замеры живота', route('admin.patients.bellies.index'));
});

Breadcrumbs::for('admin.patients.bellies.create', function ($trail) {
    $trail->parent('admin.patients.bellies.index');
    $trail->push('Добавление замеры живота', route('admin.patients.bellies.create'));
});

Breadcrumbs::for('admin.patients.bellies.edit', function ($trail, $id) {
    $trail->parent('admin.patients.bellies.index');
    $trail->push('Редактированние замеры живота', route('admin.patients.bellies.edit', $id));
});


