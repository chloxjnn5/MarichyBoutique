<?php
	session_start();
	include 'db.php';
	if ($_SESSION['login_status'] != true) {
		echo '<script>window.location="login-admin.php"</script>';
	}

	$product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($product) == 0){
		echo '<script>window.location="data_product.php"</script>';
	}
	$p = mysqli_fetch_object($product);
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
			<h3>Edit Product</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="category" required>
						<option value="">-Choose Category-</option>
						<?php
							$category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							while($r = mysqli_fetch_array($category)){
						?>
						<option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)? 'selected':''; ?>><?php echo $r['category_name'] ?></option>
						<?php } ?>
					</select>
					<input type="text" name="name" class="input-control" placeholder="Product Name" value="<?php echo $p->product_name ?>" required>
					<input type="text" name="price" class="input-control" placeholder="Price" value="<?php echo $p->product_price ?>" required>

					<img src="product/<?php echo $p->product_image ?>" width="220px">
					<input type="hidden" name="pic" value="<?php echo $p->product_image ?>">
					<input type="file" name="image" class="input-control" placeholder="">
					<textarea class="input-control" name="description" placeholder="Description"><?php echo $p->product_description ?></textarea><br>
					<select class="input-control" name="status">
						<option value="">-Choose Status-</option>
						<option value="1" <?php echo ($p->product_status == 1)? 'selected':''; ?>>Active</option>
						<option value="0" <?php echo ($p->product_status == 0)? 'selected':''; ?>>Not Active</option>
					</select>
					<input type="submit" name="submit" value="Update" class="btn-profile">
				</form>
				<?php
					if(isset($_POST['submit'])) {
						
						// menampung data inputan dari form
						$category 		= $_POST['category'];
						$name 			= $_POST['name'];
						$price 			= $_POST['price'];
						$description 	= $_POST['description'];
						$status 		= $_POST['status'];
						$pic 	 		= $_POST['pic'];

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
								unlink('./product/'.$pic);
								move_uploaded_file($tmp_name, './product/'.$newname);
								$picname = $newname;
							}

						}else{

							// jika admin tidak mengganti gambar
							$picname = $pic;

						}

						//query update data product
						$update = mysqli_query($conn, "UPDATE tb_product SET 
												category_id 		= '".$category."',
												product_name 		= '".$name."',
												product_price 		= '".$price."',
												product_description = '".$description."',
												product_image 		= '".$picname."',
												product_status	 	= '".$status."' 
												WHERE product_id = '".$p->product_id."' ");

						if($update) {
							echo '<script>alert("Successfully Update")</script>';
							echo '<script>window.location="data_product.php"</script>';
						}else{
							echo 'Failed to Update'.mysqli_error($conn);
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