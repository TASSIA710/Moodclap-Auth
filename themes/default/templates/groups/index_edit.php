<?php
include(__DIR__ . '/../misc/header.php');
?>
<div class="row">
	<div class="col-2 border-right">
		<?php include(__DIR__ . '/index_navigation.php'); ?>
	</div>
	<div class="col border-left">
		<?php include(__DIR__ . '/index_form_edit.php'); ?>
	</div>
</div>
<script src="<?= AUTH_CONFIG['ROOT']; ?>themes/default/js/group.js"></script>
<?php
include(__DIR__ . '/../misc/footer.php');
