<?php

// Validate username
if (!$PAYLOAD->username) {
	http_response_code(400);
	exit;
}


// Validate password
if (!$PAYLOAD->password) {
	http_response_code(400);
	exit;
}


// Try to login
$token = AuthManager::login($PAYLOAD->username, $PAYLOAD->password);


// Failed to login :/
if ($token === false) {
	$RESPONSE->success = false;
	return;
}


// Yayyy, we are logged in!
$RESPONSE->success = true;
$RESPONSE->token = $token;
return;
