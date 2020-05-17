
/* Register */
function register() {
	var username = validateUsername(document.getElementById('username'));
	var email = validateEmail(document.getElementById('email'));
	var password = validatePassword(document.getElementById('password'));
	var password2 = validatePasswordConfirm(document.getElementById('password2'));

	if (!username) return false;
	if (!email) return false;
	if (!password) return false;
	if (!password2) return false;

	var data = {};
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
	if (!str.match(/^[a-zA-Z]+[a-zA-Z0-9-_]+$/)) return false;
	if (str.length < 3) return false;
	if (str.length > 16) return false;
	return true;
}
/* Validate Username */



/* Validate Email */
function validateEmail(e) {
	var v = e.value.trim();
	if (!validateEmailString(v)) {
		e.classList.add('border-danger');
		return null;
	}
	removeErrorBorder(e);
	return v;
}

function validateEmailString(str) {
	if (!str) return false;
	if (!isEmail(str)) return false;
	return true;
}
/* Validate Email */



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
	if (str.length < 3) return false;
	if (str.length > 32) return false;
	return true;
}
/* Validate Password */



/* Validate Password Confirmation */
function validatePasswordConfirm(e) {
	var v = e.value.trim();
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
