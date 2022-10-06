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
			<h3>PRODUCT CATEGORY</h3>
			<div class="box">
				<p style="margin-bottom: 10px;"><a href="add_category.php"><b>Add Data</b></a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="85px">No</th>
							<th>Category Name</th>
							<th>Image</th>
							<th width="300px">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id ASC");
							if (mysqli_num_rows($category) > 0){
							while ($row = mysqli_fetch_array($category)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td><a href="category/<?php echo $row['category_image'] ?>" target="_blank"> <img src="category/<?php echo $row['category_image'] ?>" width="70px"> </a></td>
							<td>
								<a href="edit_category.php?id=<?php echo $row['category_id'] ?>"><b>Edit</b></a> | <a href="delete.php?idc=<?php echo $row['category_id'] ?>" onclick="return confirm('Are you sure you want to delete this data ?')"><b>Delete</b></a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="4">No data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
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