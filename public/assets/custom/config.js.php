<?php
include(__DIR__ . '/../../../Configuration.php');

$brand_name = AUTH_CONFIG['BRAND_NAME'];
$brand_url = AUTH_CONFIG['BRAND_URL'];
$root = AUTH_CONFIG['ROOT'];

header('Content-Type: text/javascript');

echo "const AUTH_CONFIG = {};\n";
echo "AUTH_CONFIG.BRAND_NAME = '$brand_name';\n";
echo "AUTH_CONFIG.BRAND_URL = '$brand_url';\n";
echo "AUTH_CONFIG.ROOT = '$root';";
?>
