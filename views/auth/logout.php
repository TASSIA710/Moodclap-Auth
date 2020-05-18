<?php

AuthManager::logout();
header('Location: ' . AUTH_CONFIG['ROOT']);
