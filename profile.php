<?php
	session_start();
	include 'db.php';
	if ($_SESSION['login_status'] != true) {
		echo '<script>window.location="login-admin.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."'");
	$d = mysqli_fetch_object($query);
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
			<h3>PROFILE</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="name" placeholder="Full Name" class="input-control" value="<?php echo $d->admin_name ?>" required>
					<input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
					<input type="text" name="hp" placeholder="Phone Number" class="input-control" value="<?php echo $d->admin_telp ?>" required>
					<input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
					<input type="text" name="address" placeholder="Address" class="input-control" value="<?php echo $d->admin_address ?>" required>
					<input type="submit" name="submit" value="Update Profile" class="btn-profile">
				</form>
				<?php
					if(isset($_POST['submit'])){

						$name 	= ucwords($_POST['name']);
						$user 	= $_POST['user'];
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$address= ucwords($_POST['address']);

						$update = mysqli_query($conn, "UPDATE tb_admin SET 
										admin_name = '".$name."',
										username = '".$user."',
										admin_telp = '".$hp."',
										admin_email = '".$email."',
										admin_address = '".$address."'
										WHERE admin_id = '".$d->admin_id."' ");
						if($update){
							echo '<script>alert("Updated Successfully!")</script>';
							echo '<script>window.location="profile.php"</script>';
						}else{
							echo 'Failed'.mysqli_error($conn);
						}
					}
				?>
			</div>
			
			<h3>Password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="pass1" placeholder="New Password" class="input-control" required>
					<input type="password" name="pass2" placeholder="Password Confirmation" class="input-control" required>
					<input type="submit" name="submitt" value="Update Password" class="btn-profile">
				</form>
				<?php
					if(isset($_POST['submitt'])){

						$pass1 	= $_POST['pass1'];
						$pass2	= $_POST['pass2'];

						if ($pass2 != $pass1){
							echo '<script>alert("New Password Confirmation is wrong!")</script>';
						}else{

							$u_pass = mysqli_query($conn, "UPDATE tb_admin SET
										password = '".MD5($pass1)."'
										WHERE admin_id = '".$d->admin_id."' ");
							if ($u_pass) {
								echo '<script>alert("Updated Successfully!")</script>';
								echo '<script>window.location="profile.php"</script>';
							}else{
								echo 'Failed'.mysqli_error($conn);
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