<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Панель администратора', route('admin.home'));
});



