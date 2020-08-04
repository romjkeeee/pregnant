<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.mybaby.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Мой малыш', route('admin.mybaby.index'));
});

Breadcrumbs::for('admin.mybaby.create', function ($trail) {
    $trail->parent('admin.articles.index');
    $trail->push('Добавление статьи (Мой малыш)', route('admin.mybaby.create'));
});

Breadcrumbs::for('admin.mybaby.edit', function ($trail, $id) {
    $trail->parent('admin.articles.index');
    $trail->push('Редактированние статьи (Мой малыш)', route('admin.mybaby.edit', $id));
});

