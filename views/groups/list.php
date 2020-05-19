<?php

Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add('Groups', AUTH_CONFIG['ROOT'] . 'groups/');

include(__DIR__ . '/../../themes/default/templates/groups/list.php');
