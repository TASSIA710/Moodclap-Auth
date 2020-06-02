<?php
include(__DIR__ . '/../misc/header.php');
?>
<div class="row">
	<div class="col-2 border-right">
		<?php include(__DIR__ . '/new_navigation.php'); ?>
	</div>
	<div class="col border-left">

        <div class="row">
            <div class="col-4">
                <h6 class="text-muted">Group Name:</h6>
                <div class="multi-collapse-name">
                    <input type="text" class="form-control" id="create_name_field" value="New Group">
                    <small class="text-muted ml-2">URL Slug: <span id="create_name_slug">new-group</span></small><br>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button class="btn btn-sm btn-outline-primary mr-2" id="create_button" onclick="createGroup();"><i class="fas fa-check mr-2"></i>Create Group</button>
                <button class="btn btn-sm btn-outline-secondary" onclick="abortGroupCreation();"><i class="fas fa-times mr-2"></i>Cancel</button>
            </div>
        </div>

	</div>
</div>
<script src="<?= AUTH_CONFIG['ROOT']; ?>themes/default/js/group_new.js"></script>
<?php
include(__DIR__ . '/../misc/footer.php');
