<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.clinics.reviews.index', function ($trail) {
    $trail->parent('admin.clinics.index');
    $trail->push('Отзывы', route('admin.clinics.reviews.index'));
});

Breadcrumbs::for('admin.clinics.reviews.create', function ($trail) {
    $trail->parent('admin.clinics.reviews.index');
    $trail->push('Добавление отзыва', route('admin.clinics.reviews.create'));
});

Breadcrumbs::for('admin.clinics.reviews.edit', function ($trail, $id) {
    $trail->parent('admin.clinics.prices.index');
    $trail->push('Редактированние отзыва', route('admin.clinics.reviews.edit', $id));
});

