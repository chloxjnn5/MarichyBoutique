<?php
	
	include 'db.php';

	if (isset($_GET['idc'])) {
		$category = mysqli_query($conn, "SELECT category_image FROM tb_category WHERE category_id = '".$_GET['idc']."' ");
		$c = mysqli_fetch_object($category);

		unlink('./category/'.$c->category_image);

		$delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idc']."' ");
		echo '<script>window.location="data_category.php"</script>';
	}

	if (isset($_GET['idp'])) {
		$product = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($product);

		unlink('./product/'.$p->product_image);

		$delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
		echo '<script>window.location="data_product.php"</script>';
	}

	if (isset($_GET['ido'])) {
		$delete = mysqli_query($conn, "DELETE FROM tb_cart WHERE cart_id = '".$_GET['ido']."' ");
		echo '<script>window.location="cart.php"</script>';
	}
	if (isset($_GET['idd'])) {
		$delete = mysqli_query($conn, "DELETE FROM tb_cart WHERE cart_id = '".$_GET['idd']."' ");
		echo '<script>window.location="customer.php"</script>';
	}

?>