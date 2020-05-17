<?php

include(__DIR__ . '/../../Moodclap/Init.php');
include(__DIR__ . '/../../Configuration.php');

$path = substr($_SERVER['REQUEST_URI'], strlen(AUTH_CONFIG['ROOT'] . 'api/'));


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	http_response_code(405);
	exit;
}


$PAYLOAD = json_decode(file_get_contents('php://input'));
$RESPONSE = new stdClass();


if ($path == 'login/') {
	include(__DIR__ . '/../../api/login.php');
} elseif ($path == 'register/') {
	include(__DIR__ . '/../../api/register.php');
} else {
	http_response_code(404);
	exit;
}


echo json_encode($RESPONSE);
