<?php
	session_start();
	include 'db.php';
	if ($_SESSION['login_status'] != true) {
		echo '<script>window.location="login-admin.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-ad">
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
	<div class="section">
		<div class="container">
			<h3>Add Category</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="text" name="name" placeholder="Category Name" class="input-control" required>
					<input type="file" name="image" class="input-control" placeholder="" required>
					<input type="submit" name="submit" value="Submit" class="btn-profile">
				</form>
				<?php
					if (isset($_POST['submit'])) {

						$name = ucwords($_POST['name']);

						$filename = $_FILES['image']['name'];
						$tmp_name = $_FILES['image']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = $name.'.'.$type2;

						$allowed_type = array('jpg', 'jpeg', 'png', 'gif');

						if (!in_array($type2, $allowed_type)) {
							// jika format file tidak ada di dalam tipe diizinkan 
							echo '<script>alert("File Format is Prohibited")</script>';
						}else{
							// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
							// proses upload file sekaligus insert ke database
							move_uploaded_file($tmp_name, './category/'.$newname);

							$insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
											null,
											'".$name."',
											'".$newname."') ");
							if($insert){
								echo '<script>alert("Your new data has been added successfully!")</script>';
								echo '<script>window.location="data_category.php"</script>';
							}else{
								echo 'Failed '.mysqli_error($conn);
							}
						}
					}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2022 - Marichy</small>
		</div>
	</footer>
</body>
</html>