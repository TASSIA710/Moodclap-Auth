<?php

// Check permission
if (!AuthManager::hasPermission(PERM_AC_GROUPS_EDIT)) {
	http_response_code(403);
	exit;
}



// Validate ID
if (!$PAYLOAD->id) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Missing parameter: id';
	return;
}

$GROUP = Database::getGroup($PAYLOAD->id);
if ($GROUP == null) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Group not found.';
	return;
}



// Validate permissions
if (!$PAYLOAD->permissions) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Missing parameter: name';
	return;
}

json_decode($PAYLOAD->permissions);
if (json_last_error() != JSON_ERROR_NONE) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Permissions field is not a valid JSON string.';
	return;
}



// Check permission (again)
if (!AuthManager::hasPermission(PERM_AC_GROUPS_EDIT) || $GROUP->getSortPermission() <= AuthManager::getCurrentUser()->getGroup()->getSortPermission()) {
	http_response_code(403);
	exit;
}



// Edit group
$GROUP->setPermissionJSON(json_encode(json_decode($PAYLOAD->permissions)));

$RESPONSE->success = true;
http_response_code(200);
return;
