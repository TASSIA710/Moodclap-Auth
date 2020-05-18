<?php

Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add('Accounts', AUTH_CONFIG['ROOT'] . 'accounts/');

include(__DIR__ . '/../../themes/default/templates/accounts/list.php');
