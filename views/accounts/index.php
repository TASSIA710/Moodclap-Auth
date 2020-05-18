<?php

$ACCOUNT = Database::getAccountByName($MATCHES[1]);
if ($ACCOUNT == null) {
	http_response_code(404);
	return;
}


Breadcrumbs::add(AUTH_CONFIG['BRAND_NAME'], AUTH_CONFIG['BRAND_URL']);
Breadcrumbs::add('Auth Center', AUTH_CONFIG['ROOT']);
Breadcrumbs::add($ACCOUNT->getUsername(), AUTH_CONFIG['ROOT'] . 'accounts/' . $ACCOUNT->getUsername() . '/');

include(__DIR__ . '/../../themes/default/templates/accounts/index.php');
