<?php

Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add('Login', AUTH_CONFIG['ROOT'] . 'login/');

include(__DIR__ . '/../../themes/default/templates/auth/login.php');
