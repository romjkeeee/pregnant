<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.doctors.reviews.index', function ($trail) {
    $trail->parent('admin.doctors.index');
    $trail->push('Отзывы', route('admin.doctors.reviews.index'));
});

Breadcrumbs::for('admin.doctors.reviews.create', function ($trail) {
    $trail->parent('admin.doctors.reviews.index');
    $trail->push('Добавление отзыва', route('admin.doctors.reviews.create'));
});

Breadcrumbs::for('admin.doctors.reviews.edit', function ($trail, $id) {
    $trail->parent('admin.doctors.reviews.index');
    $trail->push('Редактированние отзыва', route('admin.doctors.reviews.edit', $id));
});

