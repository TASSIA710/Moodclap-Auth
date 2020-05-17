<?php

include(__DIR__ . '/../../Configuration.php');

$resource = substr($_SERVER['REQUEST_URI'], strlen(AUTH_CONFIG['ROOT'] . 'assets/'));

include(__DIR__ . '/../../Moodclap/assets/Router.php');
