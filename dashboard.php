<?php
	error_reporting(0);
	session_start();
	if ($_SESSION['login_status'] != true) {
		echo '<script>window.location="login-admin.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Marichy Boutique</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-da">
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Marichy Boutique</h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="data_category.php">Category</a></li>
				<li><a href="data_product.php">Product</a></li>
				<li><a href="customer.php">Data</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<img src="img/mary.jpg" alt="" width="100%" style="margin-top: 12px;">
	<!-- <div class="section">
		<div class="container">
			<div class="box-d">
				<h1 style="font-family: monospace; color: purple;">Welcome <?php echo $_SESSION['a_global']->admin_name ?> to Admin Dashboard Marichy Boutique</h1>
			</div>
		</div>
	</div> -->

	<!-- footer -->
	<footer>
		<div class="container" style="margin-top: 20px;">
			<small>Copyright &copy; 2022 - Marichy</small>
		</div>
	</footer>
</body>
</html>