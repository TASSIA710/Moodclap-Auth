<?php

if (is_numeric($MATCHES[1])) {
	$GROUP = Database::getGroup($MATCHES[1]);
} else {
	$GROUP = Database::getGroupByNameID($MATCHES[1]);
}
if ($GROUP == null) {
	http_response_code(404);
	return;
}


Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add('Groups', AUTH_CONFIG['ROOT'] . 'groups/');
Breadcrumbs::add($GROUP->getName(), AUTH_CONFIG['ROOT'] . 'group/' . $GROUP->getNameID() . '/');

include(__DIR__ . '/../../themes/default/templates/groups/index.php');
