<?php

Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add('Register', AUTH_CONFIG['ROOT'] . 'register/');

include(__DIR__ . '/../../themes/default/templates/auth/register.php');
