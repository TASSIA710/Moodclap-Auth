<?php

$timing = "";
$hour = date("G");

if ($hour < 6) $timing = "night";
elseif ($hour < 12) $timing = "morning";
elseif ($hour < 17) $timing = "afternoon";
elseif ($hour < 22) $timing = "evening";
else $timing = "night";

include(__DIR__ . '/../misc/header.php');
include(__DIR__ . '/../misc/footer.php');
