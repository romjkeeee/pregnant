<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.specialisations.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Специализации', route('admin.specialisations.index'));
});

Breadcrumbs::for('admin.specialisations.create', function ($trail) {
    $trail->parent('admin.specialisations.index');
    $trail->push('Добавление специализации', route('admin.specialisations.create'));
});

Breadcrumbs::for('admin.specialisations.edit', function ($trail, $id) {
    $trail->parent('admin.specialisations.index');
    $trail->push('Редактированние специализации', route('admin.specialisations.edit', $id));
});

