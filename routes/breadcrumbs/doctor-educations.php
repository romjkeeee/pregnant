<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.doctors.educations.index', function ($trail) {
    $trail->parent('admin.doctors.index');
    $trail->push('Образование', route('admin.doctors.educations.index'));
});

Breadcrumbs::for('admin.doctors.educations.create', function ($trail) {
    $trail->parent('admin.doctors.educations.index');
    $trail->push('Добавление образования', route('admin.doctors.educations.create'));
});

Breadcrumbs::for('admin.doctors.educations.edit', function ($trail, $id) {
    $trail->parent('admin.doctors.educations.index');
    $trail->push('Редактированние образования', route('admin.doctors.educations.edit', $id));
});

