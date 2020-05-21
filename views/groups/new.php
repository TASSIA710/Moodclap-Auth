<?php

Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add('Groups', AUTH_CONFIG['ROOT'] . 'groups/');
Breadcrumbs::add('New Group', AUTH_CONFIG['ROOT'] . 'groups/new/');

include(__DIR__ . '/../../themes/default/templates/groups/new.php');
