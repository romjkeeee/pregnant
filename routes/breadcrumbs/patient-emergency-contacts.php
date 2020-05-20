<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.patients.emergency-contacts.index', function ($trail) {
    $trail->parent('admin.patients.index');
    $trail->push('Екстренные контакты', route('admin.patients.emergency-contacts.index'));
});

Breadcrumbs::for('admin.patients.emergency-contacts.create', function ($trail) {
    $trail->parent('admin.patients.emergency-contacts.index');
    $trail->push('Добавление контакта', route('admin.patients.emergency-contacts.create'));
});

Breadcrumbs::for('admin.patients.emergency-contacts.edit', function ($trail, $id) {
    $trail->parent('admin.patients.emergency-contacts.index');
    $trail->push('Редактированние контакта', route('admin.patients.emergency-contacts.edit', $id));
});


