
<div class="row w-75">

	<div class="col">
		<h6 class="text-muted">Group Name:</h6>
		<input type="text" class="form-control" value="<?= Utility::escapeXSS($GROUP->getName()); ?>" readonly>
	</div>

	<div class="col-2">
		<h6 class="text-muted">Permission Level:</h6>
		<input type="number" class="form-control" value="<?= Utility::escapeXSS($GROUP->getSortPermission()); ?>" readonly>
	</div>

	<div class="col-2">
		<h6 class="text-muted">Display Order:</h6>
		<input type="number" class="form-control" value="<?= Utility::escapeXSS($GROUP->getSortDisplay()); ?>" readonly>
	</div>

	<div class="col-2">
		<h6 class="text-muted">Actions:</h6>
		<button class="btn btn-outline-danger px-4" disabled><i class="fas fa-trash mr-2"></i>Delete</button>
	</div>

</div>



<div class="row w-75 mt-5">

	<div class="col">
		<h6 class="text-muted">Permissions:</h6>
		<?php $json =Utility::escapeXSS(json_encode($GROUP->getPermissions(), JSON_PRETTY_PRINT)); ?>
		<textarea class="form-control" rows="<?= count(explode("\n", $json)); ?>" readonly><?= $json; ?></textarea>
	</div>

</div>
