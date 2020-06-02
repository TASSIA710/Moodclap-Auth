<?php

// Check permission
if (!AuthManager::hasPermission(PERM_AC_GROUPS_CREATE)) {
    http_response_code(403);
    exit;
}



// Validate name
if (!$PAYLOAD->name) {
    $RESPONSE->success = false;
    $RESPONSE->message = 'Missing parameter: name';
    return;
}

$slug = urlencode(str_replace('', '-', strtolower($PAYLOAD->name)));

if (strlen($PAYLOAD->name) < 3) {
    $RESPONSE->success = false;
    $RESPONSE->message = 'Name must be atleast 3 characters.';
    return;
}

if (strlen($PAYLOAD->name) > 32) {
    $RESPONSE->success = false;
    $RESPONSE->message = 'Name may not be longer than 32 characters.';
    return;
}

if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9-_ ]+$/', $PAYLOAD->name)) {
    $RESPONSE->success = false;
    $RESPONSE->message = 'Name may only contain a-Z, 0-9, dashes, underscores and spaces.';
    return;
}

if (Database::getGroupByNameID($slug)) {
    $RESPONSE->success = false;
    $RESPONSE->message = 'This name/slug is already taken.';
    return;
}

if (Database::getGroupByName($PAYLOAD->name)) {
    $RESPONSE->success = false;
    $RESPONSE->message = 'This name/slug is already taken.';
    return;
}



// Create the group
Database::createGroup($PAYLOAD->name, $slug);



$RESPONSE->success = true;
http_response_code(200);
return;
