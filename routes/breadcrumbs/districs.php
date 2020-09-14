<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.districs.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Районы', route('admin.regions.index'));
});

Breadcrumbs::for('admin.districs.create', function ($trail) {
    $trail->parent('admin.districs.index');
    $trail->push('Добавление района', route('admin.districs.create'));
});

Breadcrumbs::for('admin.districs.edit', function ($trail, $id) {
    $trail->parent('admin.districs.index');
    $trail->push('Редактированние района', route('admin.districs.edit', $id));
});

