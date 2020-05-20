<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.article-category.index', function ($trail) {
    $trail->parent('admin.articles.index');
    $trail->push('Категории статей', route('admin.articles.index'));
});

Breadcrumbs::for('admin.article-category.create', function ($trail) {
    $trail->parent('admin.article-category.index');
    $trail->push('Добавление категории', route('admin.article-category.create'));
});

Breadcrumbs::for('admin.article-category.edit', function ($trail, $id) {
    $trail->parent('admin.article-category.index');
    $trail->push('Редактированние категории', route('admin.article-category.edit', $id));
});

