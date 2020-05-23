<?php

Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add('User Control Panel', AUTH_CONFIG['ROOT'] . 'usercp/');
Breadcrumbs::add('Sessions', AUTH_CONFIG['ROOT'] . 'usercp/sessions/');

include(__DIR__ . '/../../themes/default/templates/usercp/sessions.php');
