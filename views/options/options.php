<?php

Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add('Options', AUTH_CONFIG['ROOT'] . 'options/');

include(__DIR__ . '/../../themes/default/templates/options/options.php');
