<?php
if (isset($_SESSION['user_id'])) {
	$model = new \models\User();
	$user = $model->findOne(['id' => $_SESSION['user_id']]);
}
?>
<html>

<script type="text/javascript" src="../../Assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../../Assets/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="../../Assets/js/script.js"></script>
<script type="text/javascript" src="../../Assets/js/user.js"></script>

<link rel="stylesheet" type="text/css" href="../../Assets/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../Assets/style/style.css">

<head>
	<title>Mild-MVC</title>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="/news/admin" class="admin btn btn-success">Админ</a>
			</div>
			<div class="col-md-6">
				<?php if (isset($_SESSION['user_id'])): ?>
				<button onclick="ajaxUserLogout()" class="reg-button btn btn-success">Выйти</button>
				<?php else: ?>
				<a href="../user/reg" class="reg btn btn-success">Регистрация</a>
				<a href="../user/account" class="reg btn btn-success">Войти</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</body>
</html>
