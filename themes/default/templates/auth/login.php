<!DOCTYPE html>
<html>

	<head>
		<title><?= AUTH_CONFIG['WINDOW_TITLE']; ?></title>

		<link rel="stylesheet" type="text/css" href="<?= AUTH_CONFIG['ROOT'] . 'themes/default/css/simple_page.css'; ?>">
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

		<script type="text/javascript" src="<?= AUTH_CONFIG['ROOT'] . 'assets/custom/config.js.php'; ?>"></script>
		<script type="text/javascript" src="<?= AUTH_CONFIG['ROOT'] . 'assets/js/global.js'; ?>"></script>
		<script type="text/javascript" src="<?= AUTH_CONFIG['ROOT'] . 'themes/default/js/login.js'; ?>"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>

	<body class="simple-page">
		<form class="simple-container p-5" onsubmit="return login();">

			<h2><small class="fas fa-key mr-3 text-dark"></small><strong>Login</strong> to your account.</h2>
			<hr>

			<div id="error_container"></div>

			<div class="form-group">
				<label for="username" class="text-muted">Username:</label>
				<input class="form-control" type="text" id="username" oninput="validateUsername(this);">
			</div>

			<div class="form-group">
				<label for="password" class="text-muted">Password:</label>
				<input class="form-control" type="password" id="password" oninput="validatePassword(this);">
			</div>

			<br>
			<button class="btn btn-outline-primary"><i class="fas fa-key mr-2"></i>Login</button>
			<hr>

			<div class="d-flex justify-content-center">
				<a href="<?= AUTH_CONFIG['ROOT'] . 'password/'; ?>">Forgot password?</a>
				<span class="text-secondary mx-2">&vert;</span>
				<a href="<?= AUTH_CONFIG['ROOT'] . 'register/'; ?>">Don't have an account?</a>
			</div>

		</form>
	</body>

</html>
