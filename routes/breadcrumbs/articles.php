<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.articles.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Статьи', route('admin.articles.index'));
});

Breadcrumbs::for('admin.articles.create', function ($trail) {
    $trail->parent('admin.articles.index');
    $trail->push('Добавление статьи', route('admin.articles.create'));
});

Breadcrumbs::for('admin.articles.edit', function ($trail, $id) {
    $trail->parent('admin.articles.index');
    $trail->push('Редактированние статьи', route('admin.articles.edit', $id));
});

