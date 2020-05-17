<?php

include(__DIR__ . '/../Moodclap/Init.php');
include(__DIR__ . '/../Configuration.php');


if ($_SERVER['REQUEST_URI'] == AUTH_CONFIG['ROOT'] . 'login/') {
	include(__DIR__ . '/../views/auth/login.php');
} elseif ($_SERVER['REQUEST_URI'] == AUTH_CONFIG['ROOT'] . 'register/') {
	include(__DIR__ . '/../views/auth/register.php');
} else {
	include(__DIR__ . '/../views/index/index.php');
}
