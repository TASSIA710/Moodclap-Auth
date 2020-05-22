
<div class="row w-75">

	<input type="hidden" id="edit_id" value="<?= $GROUP->getID(); ?>">

	<div class="col">
		<h6 class="text-muted">
			<span>Group Name:</span>
			<a data-toggle="collapse" title="Edit Name" class="ml-1" href=".multi-collapse-name"><small class="fas fa-edit"></small></a>
		</h6>
		<div class="multi-collapse-name collapse show">
			<input type="text" class="form-control" value="<?= Utility::escapeXSS($GROUP->getName()); ?>" readonly>
		</div>
		<div class="multi-collapse-name collapse">
			<input type="text" class="form-control" id="edit_name_field" value="<?= Utility::escapeXSS($GROUP->getName()); ?>">
			<small class="text-muted ml-2">URL Slug: <span id="edit_name_slug"><?= Utility::escapeXSS($GROUP->getNameID()); ?></span></small><br>
			<button class="btn btn-sm btn-outline-primary mt-2" id="edit_name_button"><i class="fas fa-sync-alt mr-2"></i>Update Name</button>
		</div>
	</div>

	<div class="col-2">
		<h6 class="text-muted">
			<span>Permission Level:</span>
			<a data-toggle="collapse" title="Edit Name" class="ml-1" href=".multi-collapse-level"><small class="fas fa-edit"></small></a>
		</h6>
		<div class="multi-collapse-level collapse show">
			<input type="number" class="form-control" value="<?= Utility::escapeXSS($GROUP->getSortPermission()); ?>" readonly>
		</div>
		<div class="multi-collapse-level collapse">
			<input type="number" class="form-control" value="<?= Utility::escapeXSS($GROUP->getSortPermission()); ?>">
			<button class="btn btn-sm btn-outline-primary mt-2" disabled><i class="fas fa-sync-alt mr-2"></i>Update Level</button>
		</div>
	</div>

	<div class="col-2">
		<h6 class="text-muted">
			<span>Display Order:</span>
			<a data-toggle="collapse" title="Edit Name" class="ml-1" href=".multi-collapse-display"><small class="fas fa-edit"></small></a>
		</h6>
		<div class="multi-collapse-display collapse show">
			<input type="number" class="form-control" value="<?= Utility::escapeXSS($GROUP->getSortDisplay()); ?>" readonly>
		</div>
		<div class="multi-collapse-display collapse">
			<input type="number" class="form-control" value="<?= Utility::escapeXSS($GROUP->getSortDisplay()); ?>">
			<button class="btn btn-sm btn-outline-primary mt-2" disabled><i class="fas fa-sync-alt mr-2"></i>Update Order</button>
		</div>
	</div>

	<div class="col-2">
		<?php if (AuthManager::hasPermission(PERM_AC_GROUPS_DELETE)) { ?>
			<h6 class="text-muted">Actions:</h6>
			<button class="btn btn-outline-danger px-4"><i class="fas fa-trash mr-2"></i>Delete</button>
		<?php } ?>
	</div>

</div>



<div class="row w-75 mt-5">

	<div class="col">
		<h6 class="text-muted">
			<span>Permissions:</span>
			<a data-toggle="collapse" title="Edit Name" class="ml-1" href=".multi-collapse-permissions"><small class="fas fa-edit"></small></a>
		</h6>
		<?php $json =Utility::escapeXSS(json_encode($GROUP->getPermissions(), JSON_PRETTY_PRINT)); ?>
		<div class="multi-collapse-permissions collapse show">
			<textarea class="form-control" rows="<?= count(explode("\n", $json)); ?>" readonly><?= $json; ?></textarea>
		</div>
		<div class="multi-collapse-permissions collapse">
			<textarea class="form-control" id="edit_permissions_field" rows="<?= count(explode("\n", $json)); ?>"><?= $json; ?></textarea>
			<button class="btn btn-sm btn-outline-primary mt-2" id="edit_permissions_button"><i class="fas fa-sync-alt mr-2"></i>Update Permissions</button>
		</div>
	</div>

</div>
