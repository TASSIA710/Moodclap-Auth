
/* Login */
function login() {
	var username = validateUsername(document.getElementById('username'));
	var password = validatePassword(document.getElementById('password'));

	if (!username) return false;
	if (!password) return false;

	var data = {};
	data.username = username;
	data.password = password;

	launchAJAX(AUTH_CONFIG.ROOT + 'api/login/', data, function(res, status, text) {
		if (status != 200) return false;

		if (res.success) {
			setCookie('session', res.token, AUTH_CONFIG.COOKIE_DOMAIN);
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
	var v = e.value.trim();
	if (!validateUsernameString(v)) {
		e.classList.add('border-danger');
		return null;
	}
	removeErrorBorder(e);
	return v;
}

function validateUsernameString(str) {
	if (!str) return false;
	return true;
}
/* Validate Username */



/* Validate Password */
function validatePassword(e) {
	var v = e.value.trim();
	if (!validatePasswordString(v)) {
		e.classList.add('border-danger');
		return null;
	}
	removeErrorBorder(e);
	return v;
}

function validatePasswordString(str) {
	if (!str) return false;
	return true;
}
/* Validate Password */
