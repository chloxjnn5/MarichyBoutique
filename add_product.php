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
	<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
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
			<h3>Add Product</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="category" required>
						<option value="">- Choose Category -</option>
						<?php
							$category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id ASC");
							while($r = mysqli_fetch_array($category)){
						?>
						<option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
						<?php } ?>
					</select>
					<input type="text" name="name" class="input-control" placeholder="Product Name" required>
					<input type="text" name="price" class="input-control" placeholder="Price" required>
					<input type="file" name="image" class="input-control" placeholder="" required>
					<textarea class="input-control" name="description" placeholder="Description"></textarea><br>
					<select class="input-control" name="status">
						<option value="">- Choose Status -</option>
						<option value="1">Active</option>
						<option value="0">Not Active</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn-profile">
				</form>
				<?php
					if(isset($_POST['submit'])) {
						
						// print_r($_FILES['image']);
						// menampung inputan dari form
						$category 		= $_POST['category'];
						$name 			= $_POST['name'];
						$price 			= $_POST['price'];
						$description 	= $_POST['description'];
						$status 		= $_POST['status'];

						// menampung data file yang di upload
						$filename = $_FILES['image']['name'];
						$tmp_name = $_FILES['image']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = $name.'.'.$type2;

						// menampung data format file yang diizinkan
						$allowed_type = array('jpg', 'jpeg', 'png', 'gif');

						// membuat validasi format file
						if (!in_array($type2, $allowed_type)) {
							// jika format file tidak ada di dalam tipe diizinkan 
							echo '<script>alert("File Format is Prohibited")</script>';
						}else{
							// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
							// proses upload file sekaligus insert ke database
							move_uploaded_file($tmp_name, './product/'.$newname);

							$insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
										null,
										'".$category."',
										'".$name."',
										'".$price."',
										'".$description."',
										'".$newname."',
										'".$status."',
										null
											) ");
							if($insert) {
								echo '<script>alert("Successfully Added")</script>';
								echo '<script>window.location="data_product.php"</script>';
							}else{
								echo 'Failed to Upload Data'.mysqli_error($conn);
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

	<script>
        CKEDITOR.replace( 'description' );
    </script>
</body>
</html>