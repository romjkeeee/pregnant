<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.translates.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Переводы', route('admin.translates.index'));
});

Breadcrumbs::for('admin.translates.create', function ($trail) {
    $trail->parent('admin.translates.index');
    $trail->push('Добавление перевода', route('admin.translates.create'));
});

Breadcrumbs::for('admin.translates.edit', function ($trail, $id) {
    $trail->parent('admin.translates.index');
    $trail->push('Редактированние перевода', route('admin.translates.edit', $id));
});

