<?php
include(__DIR__ . '/../misc/header.php');
?>

<span class="display-4"><?= Utility::escapeXSS($ACCOUNT->getUsername()); ?></span><br>
<span class="text-muted">User #<?= Utility::escapeXSS($ACCOUNT->getID()); ?></span>

<?php
include(__DIR__ . '/../misc/footer.php');
