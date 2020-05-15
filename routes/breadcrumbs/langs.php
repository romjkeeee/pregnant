<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.langs.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Языки', route('admin.langs.index'));
});

Breadcrumbs::for('admin.langs.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Добавление языка', route('admin.langs.create'));
});

Breadcrumbs::for('admin.langs.edit', function ($trail, $id) {
    $trail->parent('admin.home');
    $trail->push('Редактированние языка', route('admin.langs.edit', $id));
});

