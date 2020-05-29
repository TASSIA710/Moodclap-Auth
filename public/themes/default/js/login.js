
/* Login */
function login() {
	const username = validateUsername(document.getElementById('username'));
	const password = validatePassword(document.getElementById('password'));

	if (!username) return false;
	if (!password) return false;

	const data = {};
	data.username = username;
	data.password = password;

	launchAJAX(AUTH_CONFIG.ROOT + 'api/login/', data, function(res, status, text) {
		if (status !== 200) return false;

		if (res.success) {
			document.location.href = AUTH_CONFIG.ROOT;
			return true;
		}

		showAlertDanger('', 'Invalid username or password.');
		return true;
	});
	return false;
}
/* Login */



/* Validate Username */
function validateUsername(e) {
	const v = e.value.trim();
	if (!validateUsernameString(v)) {
		e.classList.add('border-danger');
		return null;
	}
	removeErrorBorder(e);
	return v;
}

function validateUsernameString(str) {
	return str;

}
/* Validate Username */



/* Validate Password */
function validatePassword(e) {
	const v = e.value.trim();
	if (!validatePasswordString(v)) {
		e.classList.add('border-danger');
		return null;
	}
	removeErrorBorder(e);
	return v;
}

function validatePasswordString(str) {
	return str;

}
/* Validate Password */
