<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.article-category.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Категории статей', route('admin.articles.index'));
});

Breadcrumbs::for('admin.article-category.create', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Добавление категории', route('admin.article-category.create'));
});

Breadcrumbs::for('admin.article-category.edit', function ($trail, $id) {
    $trail->parent('admin.home');
    $trail->push('Редактированние категории', route('admin.article-category.edit', $id));
});

