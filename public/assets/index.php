<?php

include(__DIR__ . '/../../Configuration.php');

$resource = substr($_SERVER['REQUEST_URI'], strlen(AUTH_CONFIG['ROOT'] . 'assets/'));

include(__DIR__ . '/../..' . AUTH_CONFIG['CORE_PATH'] . '/assets/Router.php');
