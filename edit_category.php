<?php
	session_start();
	include 'db.php';
	if ($_SESSION['login_status'] != true) {
		echo '<script>window.location="login-admin.php"</script>';
	}

	$category = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($category) == 0){
		echo '<script>window.location="data_category.php"</script>';
	}
	$c = mysqli_fetch_object($category);
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
			<h3>Edit Category</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="text" name="name" placeholder="Category Name" class="input-control" value="<?php echo $c->category_name ?>" required>
					<img src="category/<?php echo $c->category_image ?>" width="220px">
					<input type="hidden" name="pic" value="<?php echo $c->category_image ?>">
					<input type="file" name="image" class="input-control" placeholder="">
					<input type="submit" name="submit" value="Submit" class="btn-profile">
				</form>
				<?php
					if (isset($_POST['submit'])) {
						$name = ucwords($_POST['name']);
						$pic  = $_POST['pic'];

						// menampung data new image 
						$filename = $_FILES['image']['name'];
						$tmp_name = $_FILES['image']['tmp_name'];

						// jika admin ganti 
						if($filename != '') {
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'np'.$name.'.'.$type2;

							// menampung data format file yang diizinkan
							$allowed_type = array('jpg', 'jpeg', 'png', 'gif');

							// membuat validasi format file
							if (!in_array($type2, $allowed_type)) {
								// jika format file tidak ada di dalam tipe diizinkan 
								echo '<script>alert("File Format is Prohibited")</script>';

							}else{
								unlink('./category/'.$pic);
								move_uploaded_file($tmp_name, './category/'.$newname);
								$picname = $newname;
							}

						}else{

							// jika admin tidak mengganti gambar
							$picname = $pic;

						}

						$update = mysqli_query($conn, "UPDATE tb_category SET 
												category_name 		= '".$name."',
												category_image 		= '".$picname."' 
												WHERE category_id 	= '".$c->category_id."' ");

						if($update){
							echo '<script>alert("Your data has been edit successfully!")</script>';
							echo '<script>window.location="data_category.php"</script>';
						}else{
							echo 'Failed '.mysqli_error($conn);
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