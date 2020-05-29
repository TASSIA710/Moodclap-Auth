
/* Register */
function register() {
	const username = validateUsername(document.getElementById('username'));
	const email = validateEmail(document.getElementById('email'));
	const password = validatePassword(document.getElementById('password'));
	const password2 = validatePasswordConfirm(document.getElementById('password2'));

	if (!username) return false;
	if (!email) return false;
	if (!password) return false;
	if (!password2) return false;

	const data = {};
	data.username = username;
	data.email = email;
	data.password = password;

	launchAJAX(AUTH_CONFIG.ROOT + 'api/register/', data, function(res, status, text) {
		if (status != 200) return false;

		if (res.success) {
			document.location.href = AUTH_CONFIG.ROOT + 'login/';
			return true;
		}

		showAlertDanger('', res.message);
		return true;
	});
	return false;
}
/* Register */



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
	if (!str) return false;
	if (!str.match(/^[a-zA-Z]+[a-zA-Z0-9-_]+$/)) return false;
	if (str.length < 3) return false;
	return str.length <= 16;

}
/* Validate Username */



/* Validate Email */
function validateEmail(e) {
	const v = e.value.trim();
	if (!validateEmailString(v)) {
		e.classList.add('border-danger');
		return null;
	}
	removeErrorBorder(e);
	return v;
}

function validateEmailString(str) {
	if (!str) return false;
	return isEmail(str);

}
/* Validate Email */



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
	if (!str) return false;
	if (str.length < 3) return false;
	return str.length <= 32;

}
/* Validate Password */



/* Validate Password Confirmation */
function validatePasswordConfirm(e) {
	const v = e.value.trim();
	if (!validatePasswordConfirmString(v)) {
		e.classList.add('border-danger');
		return null;
	}
	removeErrorBorder(e);
	return v;
}

function validatePasswordConfirmString(str) {
	return str == document.getElementById('password').value.trim();
}
/* Validate Password Confirmation */
