<?php

foreach (glob(base_path('/routes/breadcrumbs/*.php')) as $file) {
    require_once($file);
}
