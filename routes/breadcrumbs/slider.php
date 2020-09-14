<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.slider.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Слайдер', route('admin.slider.index'));
});

Breadcrumbs::for('admin.slider.create', function ($trail) {
    $trail->parent('admin.articles.index');
    $trail->push('Добавление картинки', route('admin.slider.create'));
});

Breadcrumbs::for('admin.slider.edit', function ($trail, $id) {
    $trail->parent('admin.slider.index');
    $trail->push('Обновление картинки', route('admin.slider.edit', $id));
});

