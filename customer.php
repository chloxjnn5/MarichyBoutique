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

	<div class="section">
		<div class="container">
			<h3 class="line" style="text-align:center; font-size: 1.3rem;">ORDER DATA</h3>
			<div class="box" style="margin-top: 20px;">
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="70px">No</th>
							<th>Name</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Order Request</th>
							<th width="150px">Payment Method</th>
							<th width="150px">Date</th>
							<th>Confirmation</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$cart = mysqli_query($conn, "SELECT * FROM tb_cart INNER JOIN tb_user ON tb_cart.user_id = tb_user.user_id INNER JOIN tb_product ON tb_cart.product_id = tb_product.product_id");
							if(mysqli_num_rows($cart) > 0){
							while ($row = mysqli_fetch_array($cart)) {
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['user_name'] ?></td>
							<td><?php echo $row['product_name'] ?></td>
							<td><?php echo $row['amount'] ?></td>
							<td><?php echo $row['request'] ?></td>
							<td><?php echo $row['payment'] ?></td>
							<td><?php echo $row['data_created'] ?></td>
							<td>
								<a href="delete.php?idd=<?php echo $row['cart_id'] ?>" onclick="return confirm('Are you sure you want to confirm this data ?')"><u>Done</u></a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="6">There's No Order</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<br>
			<h3 class="line" style="text-align:center; font-size: 1.3rem;">CUSTOMER DATA</h3>
			<div class="box" style="margin-top: 20px;">
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="70px">No</th>
							<th>Customer Name</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$customer = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY user_id ASC");
							if(mysqli_num_rows($customer) > 0){
							while ($row = mysqli_fetch_array($customer)) {
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['user_name'] ?></td>
							<td><?php echo $row['user_email'] ?></td>
							<td><?php echo $row['user_telp'] ?></td>
							<td><?php echo $row['user_address'] ?></td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="6">There's No Data</td>
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