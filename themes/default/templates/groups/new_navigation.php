
<h6 class="text-muted">GROUPS&ensp;<a href="<?= AUTH_CONFIG['ROOT']; ?>groups/new/" class="badge badge-primary">NEW</a></h6>

<?php
foreach (Database::getAllGroups() as $group) { ?>
	<a href="<?= AUTH_CONFIG['ROOT'] . 'group/' . Utility::escapeXSS($group->getNameID()) . '/'; ?>"><?= Utility::escapeXSS($group->getName()); ?></a>
	<br>
<?php }
?>
