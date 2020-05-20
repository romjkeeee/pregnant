<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.patients.contractions.index', function ($trail) {
    $trail->parent('admin.patients.index');
    $trail->push('Счетчик схваток', route('admin.patients.contractions.index'));
});

Breadcrumbs::for('admin.patients.contractions.create', function ($trail) {
    $trail->parent('admin.patients.contractions.index');
    $trail->push('Добавление счетчика схваток', route('admin.patients.contractions.create'));
});

Breadcrumbs::for('admin.patients.contractions.edit', function ($trail, $id) {
    $trail->parent('admin.patients.contractions.index');
    $trail->push('Редактированние счетчика схваток', route('admin.patients.contractions.edit', $id));
});


