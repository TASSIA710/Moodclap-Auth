
<!DOCTYPE html>
<html>

	<head>

		<title><?= AUTH_CONFIG['WINDOW_TITLE']; ?></title>

		<link rel="stylesheet" type="text/css" href="<?= AUTH_CONFIG['ROOT'] . 'assets/css/global.css'; ?>">
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

		<script type="text/javascript" src="<?= AUTH_CONFIG['ROOT'] . 'assets/custom/config.js.php'; ?>"></script>
		<script type="text/javascript" src="<?= AUTH_CONFIG['ROOT'] . 'assets/js/global.js'; ?>"></script>
		<script type="text/javascript" src="<?= AUTH_CONFIG['ROOT'] . 'assets/js/relative_time.js'; ?>"></script>
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

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

			<a class="navbar-brand text-light ml-2" href="<?= AUTH_CONFIG['ROOT']; ?>"><?= AUTH_CONFIG['BRAND_NAME']; ?></a>

			<span class="nav-item text-secondary">Auth Center</span>

			<ul class="navbar-nav mr-auto">
				<li class="nav-item ml-3">
					<a class="nav-link" href="<?= AUTH_CONFIG['ROOT'] . 'accounts/'; ?>"><i class="fas fa-user mr-2"></i>Accounts</a>
				</li>
				<li class="nav-item ml-3">
					<a class="nav-link" href="<?= AUTH_CONFIG['ROOT'] . 'groups/'; ?>"><i class="fas fa-users mr-2"></i>Groups</a>
				</li>
				<li class="nav-item ml-3">
					<a class="nav-link" href="<?= AUTH_CONFIG['ROOT'] . 'usercp/'; ?>"><i class="fas fa-user-cog mr-2"></i>UserCP</a>
				</li>
				<li class="nav-item ml-3">
					<a class="nav-link" href="<?= AUTH_CONFIG['ROOT'] . 'options/'; ?>"><i class="fas fa-tools mr-2"></i>Options</a>
				</li>
			</ul>

			<div class="form-inline">
				<a class="text-secondary mr-3" href="#header_stats" data-toggle="collapse"><i class="fas fa-info-circle"></i></a>
				<?php if (AuthManager::isLoggedIn()) { ?>
					<span class="text-light">Welcome back,
						<a class="text-light" href="<?= AUTH_CONFIG['ROOT'] . 'account/' . Utility::escapeXSS(AuthManager::getCurrentUser()->getUsername()) . '/'; ?>">
							<?= Utility::escapeXSS(AuthManager::getCurrentUser()->getUsername()); ?></a>.</span>
					<a class="ml-3 btn btn-sm btn-outline-danger" href="<?= AUTH_CONFIG['ROOT'] . 'logout/'; ?>">Logout<i class="fas fa-sign-out-alt ml-2"></i></a>
				<?php } else { ?>
					<a class="text-light" href="<?= AUTH_CONFIG['ROOT'] . 'login/'; ?>"><i class="fas fa-key mr-2"></i>Login</a>
					<span class="text-light mx-2">&vert;</span>
					<a class="text-light" href="<?= AUTH_CONFIG['ROOT'] . 'register/'; ?>"><i class="fas fa-id-card mr-2"></i>Register</a>
				<?php } ?>
			</div>

		</nav>

		<div class="bg-light text-muted collapse" id="header_stats">
			<div class="py-2 d-flex justify-content-center">
				<span>Generated in <code id="stat_time_total">?ms</code> (PHP: <code id="stat_time_php">?ms</code>, SQL: <code id="stat_time_sql">?ms</code>)</span>
				<span class="mx-2">&vert;</span>
				<span>Ran <code id="stat_count_queries">?</code> initial DB queries</span>
				<span class="mx-2">&vert;</span>
				<span>Core <code><?= MC_VER_MMPB; ?></code></span>
				<span class="mx-2">&vert;</span>
				<span>Auth Center <code><?= MC_AC_VER_MMPB; ?></code></span>
			</div>
		</div>

		<div class="p-5">

			<div id="error_container"></div>

			<?php if (count(Breadcrumbs::get()) != 0) { ?>
				<div class="breadcrumb">
					<?php for ($i = 0; $i < count(Breadcrumbs::get()); $i++) {
						if ($i == count(Breadcrumbs::get()) - 1) {
							echo '<span class="breadcrumb-item active">';
							echo Utility::escapeXSS(Breadcrumbs::get()[$i]['name']);
							echo '</span>';
						} else {
							echo '<span class="breadcrumb-item">';
							echo '<a href="' . Utility::escapeXSS(Breadcrumbs::get()[$i]['url']) . '">' . Utility::escapeXSS(Breadcrumbs::get()[$i]['name']) . '</a>';
							echo '</span>';
						}
					} ?>
				</div>
				<hr>
			<?php } ?>
