
<?php
$id = Utility::escapeXSS($GROUP->getID());
$name = Utility::escapeXSS($GROUP->getName());;
$slug = Utility::escapeXSS($GROUP->getNameID());;
$sortPerm = Utility::escapeXSS($GROUP->getSortPermission());
$sortPermMin = Utility::escapeXSS(AuthManager::getCurrentUser()->getGroup()->getSortPermission() + 1);
$sortPermMax = 9999;
$sortDisplay = Utility::escapeXSS($GROUP->getSortDisplay());
$sortDisplayMin = Utility::escapeXSS(AuthManager::getCurrentUser()->getGroup()->getSortDisplay() + 1);
$sortDisplayMax = 9999;
$perms = Utility::escapeXSS(json_encode($GROUP->getPermissions(), JSON_PRETTY_PRINT));
$permsRow = count(explode("\n", $perms));
?>

<div class="row w-75">

	<input type="hidden" id="edit_id" value="<?= $id; ?>">

	<div class="col">
		<h6 class="text-muted">
			<span>Group Name:</span>
			<a data-toggle="collapse" title="Edit Name" class="ml-1" href=".multi-collapse-name"><small class="fas fa-edit"></small></a>
		</h6>
		<div class="multi-collapse-name collapse show">
			<input type="text" class="form-control" value="<?= $name; ?>" readonly>
		</div>
		<div class="multi-collapse-name collapse">
			<input type="text" class="form-control" id="edit_name_field" value="<?= $name; ?>">
			<small class="text-muted ml-2">URL Slug: <span id="edit_name_slug"><?= $slug; ?></span></small><br>
			<button class="btn btn-sm btn-outline-primary mt-2" id="edit_name_button"><i class="fas fa-sync-alt mr-2"></i>Update Name</button>
		</div>
	</div>

	<div class="col-2">
		<h6 class="text-muted">
			<span>Permission Level:</span>
			<a data-toggle="collapse" title="Edit Name" class="ml-1" href=".multi-collapse-level"><small class="fas fa-edit"></small></a>
		</h6>
		<div class="multi-collapse-level collapse show">
			<input type="number" class="form-control" value="<?= $sortPerm; ?>" readonly>
		</div>
		<div class="multi-collapse-level collapse">
			<input type="number" class="form-control" id="edit_sort_permission_field" min="<?= $sortPermMin; ?>" max="<?= $sortPermMax; ?>" value="<?= $sortPerm; ?>">
			<button class="btn btn-sm btn-outline-primary mt-2" id="edit_sort_permission_button"><i class="fas fa-sync-alt mr-2"></i>Update Level</button>
		</div>
	</div>

	<div class="col-2">
		<h6 class="text-muted">
			<span>Display Order:</span>
			<a data-toggle="collapse" title="Edit Name" class="ml-1" href=".multi-collapse-display"><small class="fas fa-edit"></small></a>
		</h6>
		<div class="multi-collapse-display collapse show">
			<input type="number" class="form-control" value="<?= $sortDisplay; ?>" readonly>
		</div>
		<div class="multi-collapse-display collapse">
			<input type="number" class="form-control" id="edit_sort_display_field" min="<?= $sortDisplayMin; ?>" max="<?= $sortDisplayMax; ?>" value="<?= $sortDisplay; ?>">
			<button class="btn btn-sm btn-outline-primary mt-2" id="edit_sort_display_button"><i class="fas fa-sync-alt mr-2"></i>Update Order</button>
		</div>
	</div>

	<div class="col-2">
		<?php if (AuthManager::hasPermission(PERM_AC_GROUPS_DELETE)) { ?>
			<h6 class="text-muted">Actions:</h6>
			<button class="btn btn-outline-danger px-4" disabled><i class="fas fa-trash mr-2"></i>Delete</button>
		<?php } ?>
	</div>

</div>



<div class="row w-75 mt-5">

	<div class="col">
		<h6 class="text-muted">
			<span>Permissions:</span>
			<a data-toggle="collapse" title="Edit Name" class="ml-1" href=".multi-collapse-permissions"><small class="fas fa-edit"></small></a>
		</h6>
		<div class="multi-collapse-permissions collapse show">
			<textarea class="form-control" rows="<?= $permsRow; ?>" readonly><?= $perms; ?></textarea>
		</div>
		<div class="multi-collapse-permissions collapse">
			<textarea class="form-control" id="edit_permissions_field" rows="<?= $permsRow; ?>"><?= $perms; ?></textarea>
			<button class="btn btn-sm btn-outline-primary mt-2" id="edit_permissions_button"><i class="fas fa-sync-alt mr-2"></i>Update Permissions</button>
		</div>
	</div>

</div>
