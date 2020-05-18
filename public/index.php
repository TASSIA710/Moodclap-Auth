<?php

include(__DIR__ . '/../Moodclap/Init.php');
include(__DIR__ . '/../Configuration.php');


$REQUEST_URI = substr($_SERVER['REQUEST_URI'], strlen(AUTH_CONFIG['ROOT']));
$MATCHES = [];


if (AuthManager::isLoggedIn()) {

	/* == -- Authenticated -- == */
	if ($REQUEST_URI == 'logout/') {
		// Show logout
		include(__DIR__ . '/../views/auth/logout.php');

	} elseif ($REQUEST_URI == '') {
		// Show index
		include(__DIR__ . '/../views/index/index.php');

	} elseif ($REQUEST_URI == 'accounts/') {
		// Show accounts
		include(__DIR__ . '/../views/accounts/list.php');

	} elseif (preg_match('/account\/([a-zA-Z0-9-_]+)\//', $REQUEST_URI, $MATCHES)) {
		// Show account
		include(__DIR__ . '/../views/accounts/index.php');

	} elseif ($REQUEST_URI == 'groups/') {
		// Show groups
		// TODO

	} else {
		// Redirect to index
		header('Location: ' . AUTH_CONFIG['ROOT']);

	}
	/* == -- Authenticated -- == */

} else {

	/* == -- Not Authenticated -- == */
	if ($REQUEST_URI == 'login/') {
		// Show login
		include(__DIR__ . '/../views/auth/login.php');

	} elseif ($REQUEST_URI == 'register/') {
		// Show register
		include(__DIR__ . '/../views/auth/register.php');

	} else {
		// Redirect to login
		header('Location: ' . AUTH_CONFIG['ROOT'] . 'login/');

	}
	/* == -- Not Authenticated -- == */

}
