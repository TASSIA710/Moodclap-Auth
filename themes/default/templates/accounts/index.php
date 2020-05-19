<?php
include(__DIR__ . '/../misc/header.php');
?>



<span class="display-4"><?= Utility::escapeXSS($ACCOUNT->getUsername()); ?></span><br>
<h4 class="text-muted">User #<?= Utility::escapeXSS($ACCOUNT->getID()) . ' | ' . Utility::escapeXSS($ACCOUNT->getGroup()->getName()); ?></h4>
<span class="badge badge-secondary">OFFLINE</span>



<div class="row mt-5">
	<div class="col-3">
		<h5 class="text-muted mb-2">
			<i class="fas fa-users mr-2"></i>
			<span>Group:</span>
			<a class="ml-1" data-toggle="collapse" href=".collapse-edit-group" title="Edit Group"><small class="fas fa-edit"></small></a>
		</h5>
		<div class="collapse-edit-group collapse show">
			<input type="text" class="form-control text-muted" value="<?= Utility::escapeXSS($ACCOUNT->getGroup()->getName()); ?>" readonly>
		</div>
		<div class="collapse-edit-group collapse">
			<select class="form-control">
				<?php foreach (Database::getAllGroups() as $GROUP) {
					if ($GROUP->getID() == $ACCOUNT->getGroupID()) { ?>
						<option value="<?= Utility::escapeXSS($GROUP->GetID()); ?>" selected><?= Utility::escapeXSS($GROUP->getName()); ?></option>
					<?php } else { ?>
						<option value="<?= Utility::escapeXSS($GROUP->GetID()); ?>"><?= Utility::escapeXSS($GROUP->getName()); ?></option>
					<?php } ?>
				<?php } ?>
			</select>
			<button class="btn btn-sm btn-outline-primary mt-2" id="group_edit_button" onclick="editUserGroup();" disabled>
				<i class="fas fa-sync-alt mr-2"></i>Update Group
			</button>
		</div>
	</div>
</div>



<?php
include(__DIR__ . '/../misc/footer.php');
