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
if (!$PAYLOAD->sorting) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Missing parameter: sorting';
	return;
}

if (!is_numeric($PAYLOAD->sorting)) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Sorting is not a number.';
	return;
}

if ($PAYLOAD->sorting < AuthManager::getCurrentUser()->getGroup()->getSortDisplay() + 1) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Sorting (min val) = ' . (AuthManager::getCurrentUser()->getGroup()->getSortDisplay() + 1);
	return;
}

if ($PAYLOAD->sorting > 9999) {
	$RESPONSE->success = false;
	$RESPONSE->message = 'Sorting (max val) = 9999';
	return;
}



// Check permission (again)
if (!AuthManager::hasPermission(PERM_AC_GROUPS_EDIT) || $GROUP->getSortPermission() <= AuthManager::getCurrentUser()->getGroup()->getSortPermission()) {
	http_response_code(403);
	exit;
}



// Edit group
$GROUP->setSortDisplay($PAYLOAD->sorting);

$RESPONSE->success = true;
http_response_code(200);
return;
