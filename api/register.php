<?php

// Validate username
if (!$PAYLOAD->username) {
	http_response_code(400);
	exit;
}
if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9-_]+$/', $PAYLOAD->username)) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Username may only contain a-z, A-Z, 0-9, dashes and underscores. It may only start with a-z or A-Z.';
	return;
}
if (strlen($PAYLOAD->username) < 3) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Username is too short.';
	return;
}
if (strlen($PAYLOAD->username) > 16) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Username is too long.';
	return;
}
if (Database::getAccountByName($PAYLOAD->username) != null) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Username is already taken.';
	return;
}


// Validate password
if (!$PAYLOAD->password) {
	http_response_code(400);
	exit;
}
if (strlen($PAYLOAD->password) < 3) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Password is too short.';
	return;
}
if (strlen($PAYLOAD->password) > 32) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Password is too long.';
	return;
}


// Validate email
if (!$PAYLOAD->email) {
	http_response_code(400);
	exit;
}
// TODO: Valid email?
// TODO: Taken?



AuthManager::createAccount($PAYLOAD->username, $PAYLOAD->password);
$RESPONSE->success = true;
return;
