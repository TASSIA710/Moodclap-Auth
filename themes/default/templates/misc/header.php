
<!DOCTYPE html>
<html>

	<head>

		<title><?= AUTH_CONFIG['WINDOW_TITLE']; ?></title>

		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		<style>
		@import url('https://fonts.googleapis.com/css?family=Nunito');
		.font {
			font-family: Nunito;
		}
		</style>

	</head>

	<body class="font">

		<nav class="navbar navbar-expand-lg navbar-dark border-bottom bg-dark">

			<a class="navbar-brand text-light ml-2" href="<?= AUTH_CONFIG['ROOT']; ?>"><i class="fas fa-database mr-2"></i><?= AUTH_CONFIG['BRAND_NAME']; ?></a>

			<ul class="navbar-nav mr-auto">
				<li class="nav-item text-secondary">
					Auth Center
				</li>
			</ul>

			<div class="form-inline">
				<?php if (AuthManager::isLoggedIn()) { ?>
					<span class="text-light">Welcome back, <a class="text-light" href="<?= AUTH_CONFIG['ROOT'] . 'account/' . AuthManager::getCurrentUser()->getUsername() . '/'; ?>"><?= AuthManager::getCurrentUser()->getUsername(); ?></a>.</span>
					<a class="ml-3 btn btn-outline-danger text-light" href="<?= AUTH_CONFIG['ROOT'] . 'logout/'; ?>">Logout<i class="fas fa-sign-out-alt ml-2"></i></a>
				<?php } else { ?>
					<a class="text-light" href="<?= AUTH_CONFIG['ROOT'] . 'login/'; ?>"><i class="fas fa-key mr-2"></i>Login</a>
					<span class="text-light mx-2">&vert;</span>
					<a class="text-light" href="<?= AUTH_CONFIG['ROOT'] . 'register/'; ?>"><i class="fas fa-id-card mr-2"></i>Register</a>
				<?php } ?>
			</div>

		</nav>

		<div class="p-5">

			<?php if (count(Breadcrumbs::get()) != 0) { ?>
				<div class="breadcrumb">
					<?php for ($i = 0; $i < count(Breadcrumbs::get()); $i++) {
						if ($i == count(Breadcrumbs::get()) - 1) {
							echo '<span class="breadcrumb-item active">';
							echo Breadcrumbs::get()[$i]['name'];
							echo '</span>';
						} else {
							echo '<span class="breadcrumb-item">';
							echo '<a href="' . Breadcrumbs::get()[$i]['url'] . '">' . Breadcrumbs::get()[$i]['name'] . '</a>';
							echo '</span>';
						}
					} ?>
				</div>
				<hr>
			<?php } ?>
