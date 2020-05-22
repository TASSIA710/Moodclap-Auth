
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
	if (name.length > 32) return false;
	return true;
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





/* Load Event */
window.addEventListener('load', function() {
	var e;

	e = document.getElementById('edit_name_field');
	if (e) e.addEventListener('input', function() { updateNameField(document.getElementById('edit_name_field')); });

	e = document.getElementById('edit_name_button');
	if (e) e.addEventListener('click', updateName);
});
/* Load Event */
