
<?php
$list = [];
foreach (Database::getAllGroups() as $group) {
	$list[count($list)] = [
		'url' => Utility::escapeXSS($group->getNameID()),
		'name' => $GROUP->getID() == $group->getID() ? '&raquo;&ensp;' . Utility::escapeXSS($group->getName()) : Utility::escapeXSS($group->getName())
	];
}
?>

<h6 class="text-muted">GROUPS&ensp;<a href="<?= AUTH_CONFIG['ROOT']; ?>groups/new/" class="badge badge-secondary">NEW</a></h6>

<?php
foreach ($list as $e) {
	echo '<a href="' . AUTH_CONFIG['ROOT'] . 'group/' . $e['url'] . '/">' . $e['name'] . '</a>';
	echo '<br>';
}
?>
