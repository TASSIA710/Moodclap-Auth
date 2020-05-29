
/* Edit Name */
function updateNameField(e) {
	var name = e.value.trim();
	var slug = encodeURI(name.toLowerCase().split(' ').join('-'));

	document.getElementById('edit_name_slug').innerHTML = slug;

	if (!validateName(name)) e.classList.add('border-danger');
	else e.classList.remove('border-danger');
}

function validateName(name) {
	if (!name) return false;
	if (!name.match(/^[a-zA-Z]+[a-zA-Z0-9-_ ]+$/)) return false;
	if (name.length < 3) return false;
	return name.length <= 32;

}

function updateName() {
	document.getElementById('edit_name_button').disabled = true;
	var name = document.getElementById('edit_name_field').value.trim();
	var slug = encodeURI(name.toLowerCase().split(' ').join('-'));
	if (!validateName(name)) return;

	var data = {};
	data.id = document.getElementById('edit_id').value;
	data.name = name;

	launchAJAX(AUTH_CONFIG.ROOT + 'api/group/edit/name/', data, function(res, status, text) {
		if (status != 200) {
			document.getElementById('edit_name_button').disabled = false;
			return false;
		}

		if (res.success) {
			document.location.href = AUTH_CONFIG.ROOT + 'group/' + slug + '/';
			return true;
		}

		showAlertDanger('', res.message);
		document.getElementById('edit_name_button').disabled = false;
		return true;
	});
}
/* Edit Name */





/* Edit Sort Permission */
function updateSortPermissionField(e) {
	validateSortPermission(e);
}

function validateSortPermission(e) {
	if (e.value < e.min || e.value > e.max) {
		e.classList.add('border-danger')
		return false;
	} else {
		e.classList.remove('border-danger')
		return true;
	}
}

function updateSortPermission() {
	document.getElementById('edit_sort_permission_button').disabled = true;
	var e = document.getElementById('edit_sort_permission_field');
	if (!validateSortPermission(e)) return;

	var data = {};
	data.id = document.getElementById('edit_id').value;
	data.sorting = e.value;

	launchAJAX(AUTH_CONFIG.ROOT + 'api/group/edit/sort_permission/', data, function(res, status, text) {
		if (status != 200) {
			document.getElementById('edit_sort_permission_button').disabled = false;
			return false;
		}

		if (res.success) {
			document.location.reload();
			return true;
		}

		showAlertDanger('', res.message);
		document.getElementById('edit_sort_permission_button').disabled = false;
		return true;
	});
}
/* Edit Sort Permission */





/* Edit Sort Display */
function updateSortDisplayField(e) {
	validateSortDisplay(e);
}

function validateSortDisplay(e) {
	if (e.value < e.min || e.value > e.max) {
		e.classList.add('border-danger')
		return false;
	} else {
		e.classList.remove('border-danger')
		return true;
	}
}

function updateSortDisplay() {
	document.getElementById('edit_sort_display_button').disabled = true;
	var e = document.getElementById('edit_sort_display_field');
	if (!validateSortPermission(e)) return;

	var data = {};
	data.id = document.getElementById('edit_id').value;
	data.sorting = e.value;

	launchAJAX(AUTH_CONFIG.ROOT + 'api/group/edit/sort_display/', data, function(res, status, text) {
		if (status != 200) {
			document.getElementById('edit_sort_display_button').disabled = false;
			return false;
		}

		if (res.success) {
			document.location.reload();
			return true;
		}

		showAlertDanger('', res.message);
		document.getElementById('edit_sort_display_button').disabled = false;
		return true;
	});
}
/* Edit Sort Display */





/* Edit Permissions */
function updatePermissionsField(e) {
	var permissions = e.value.trim();

	if (!validatePermissions(permissions)) e.classList.add('border-danger');
	else e.classList.remove('border-danger');
}

function validatePermissions(permissions) {
	try {
		JSON.parse(permissions);
		return true;
	} catch (e) {
		return false;
	}
}

function updatePermissions() {
	document.getElementById('edit_permissions_button').disabled = true;
	var permissions = document.getElementById('edit_permissions_field').value.trim();
	if (!validatePermissions(permissions)) return;

	var data = {};
	data.id = document.getElementById('edit_id').value;
	data.permissions = permissions;

	launchAJAX(AUTH_CONFIG.ROOT + 'api/group/edit/permissions/', data, function(res, status, text) {
		if (status != 200) {
			document.getElementById('edit_permissions_button').disabled = false;
			return false;
		}

		if (res.success) {
			document.location.reload();
			return true;
		}

		showAlertDanger('', res.message);
		document.getElementById('edit_permissions_button').disabled = false;
		return true;
	});
}
/* Edit Permissions */





/* Load Event */
window.addEventListener('load', function() {
	var e;

	e = document.getElementById('edit_name_field');
	if (e) e.addEventListener('input', function() { updateNameField(document.getElementById('edit_name_field')); });

	e = document.getElementById('edit_name_button');
	if (e) e.addEventListener('click', updateName);

	e = document.getElementById('edit_sort_permission_field');
	if (e) e.addEventListener('input', function() { updateSortPermissionField(document.getElementById('edit_sort_permission_field')); });

	e = document.getElementById('edit_sort_permission_button');
	if (e) e.addEventListener('click', updateSortPermission);

	e = document.getElementById('edit_sort_display_field');
	if (e) e.addEventListener('input', function() { updateSortDisplayField(document.getElementById('edit_sort_display_field')); });

	e = document.getElementById('edit_sort_display_button');
	if (e) e.addEventListener('click', updateSortDisplay);

	e = document.getElementById('edit_permissions_field');
	if (e) e.addEventListener('input', function() { updatePermissionsField(document.getElementById('edit_permissions_field')); });

	e = document.getElementById('edit_permissions_button');
	if (e) e.addEventListener('click', updatePermissions);
});
/* Load Event */
