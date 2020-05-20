<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.languages.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Языки', route('admin.languages.index'));
});

Breadcrumbs::for('admin.languages.create', function ($trail) {
    $trail->parent('admin.languages.index');
    $trail->push('Добавление языка', route('admin.languages.create'));
});

Breadcrumbs::for('admin.languages.edit', function ($trail, $id) {
    $trail->parent('admin.languages.index');
    $trail->push('Редактированние языка', route('admin.languages.edit', $id));
});

