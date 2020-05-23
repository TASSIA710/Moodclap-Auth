<?php

Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add('User Control Panel', AUTH_CONFIG['ROOT'] . 'usercp/');
Breadcrumbs::add('Disable Account', AUTH_CONFIG['ROOT'] . 'usercp/disable/');

include(__DIR__ . '/../../themes/default/templates/usercp/disable.php');
