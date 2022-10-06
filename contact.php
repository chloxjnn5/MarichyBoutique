<?php
	session_start();
	if ($_SESSION['login_statuss'] != true) {
		echo '<script>window.location="login.php"</script>';
	}
	include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Marichy Boutique</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-c">
	<!-- header -->
	<header class="head">
		<div class="container">
			<h1><a href="index.php">Marichy Boutique</h1>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="product.php">Product</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li>
					<a href="cart.php" style="color: #fff;">
						<i class="fa fa-shopping-cart" style="font-size: 20px; color: #fff;"></i>
					</a>
				</li>
				<li>
					<form action="product.php" class="search">
						<input type="text" name="search" placeholder="Find Product">
						<input type="submit" name="find" value="Find">
					</form>
				</li>
				<li>
					<a href="user.php">
						<i class="fa fa-user" style="font-size:20px"></i>
					</a>
				</li>
			</ul>
		</div>
	</header>

	<!-- Contact -->
	<div class="section">
		<div class="container">
			<div class="box" style="margin: 0px 50px; margin-top: 35px;">
				<h1 class="line" style="text-align: center; font-family: sans; color: #000; margin-top: 20px; margin-bottom: 30px; font-size: 1.3rem;">CONTACT US</h1>
				<form name="submit-to-google-sheet" id="contactForm" novalidate="novalidate">
        	        <input type="text" class="input-control" placeholder="Your Name" name="name" required>
        	        <input type="email" class="input-control" placeholder="Your Email" name="email" required>
        	        <input type="text" class="input-control" placeholder="Subject" name="subject" required>
        	        <textarea class="input-control" name="message" placeholder="Message"></textarea>
                    <button class="btn btn-sent" type="submit" style="margin-left: 414px; margin-top: 10px; margin-bottom: 15px;">Send Message</button>
                </form>
			</div>
		</div>
	</div>

	<!-- Google Maps -->
	<div class="section">
		<div class="container">
			<div class="box">
				<p>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17860.604881557378!2d106.9332275614363!3d-6.683251797624792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd981b6c202b94ed7!2sRoyal%20Safari%20Garden%20Resort%20%26%20Convention!5e0!3m2!1sen!2sid!4v1662169270566!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</p>
				<h1 class="line" style="text-align: center; font-family: sans; color: #000; margin-top: 20px; margin-bottom: 10px; font-size: 1.3rem;">OUR LOCATION STORE</h1>
			</div>
		</div>
	</div>

	<footer class="cop" style="margin-top: 40px;">
		<div class="container">
			<div class="section">
				<div class="foot">
					<div class="left-box">
						<i class="fa fa-map-marker" aria-hidden="true"> 28 White tower, New York City, USA</i><br>
	               <i class="fa fa-phone" aria-hidden="true"> Call : +62 890 1234 5678</i><br>
	               <i class="fa fa-envelope" aria-hidden="true"> marichy@gmail.com</i>
					</div>
					<div class="center-box">
							<a href="#">
		                  <i class="fa fa-facebook" aria-hidden="true" style="font-size: 24px;"></i>
		               </a>
		               <a href="#">
		                  <i class="fa fa-twitter" aria-hidden="true" style="font-size: 24px;"></i>
		               </a><!-- 
		               <a href="">
		       	         <i class="fa fa-linkedin" aria-hidden="true" style="font-size: 24px;"></i>
		               </a> -->
		               <a href="https://www.instagram.com/clau_han/">
		                  <i class="fa fa-instagram" aria-hidden="true" style="font-size: 24px;"></i>
		               </a>
		               <a href="https://id.pinterest.com/pin/749919775466156038/">
		   	            <i class="fa fa-pinterest" aria-hidden="true" style="font-size: 24px;"></i>
		   	         </a>
		               <a href="https://www.youtube.com/channel/UCEIklot_7NLhUv6gT_Gh0Qg">
		       	         <i class="fa fa-youtube-play" aria-hidden="true" style="font-size: 24px;"></i>
		               </a>
					</div>
					<div class="right-box">
						<h3>MENU</h3>
						<!-- <ul>
	               <li> --><a href="index.php">HOME |</a><!-- </li>
	               <li> --><a href="about.php">ABOUT US |</a><!-- </li>
	               <li> --><a href="contact.php">CONTACT</a><!-- </li>
	               </ul> -->
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="cpy_" style="text-align: center;">
		<small style="color: #fff">Copyright &copy; 2022 - Marichy</small>
	</div>

	<script>
		const scriptURL = 'https://script.google.com/macros/s/AKfycbwkDSDEf4ES0c_6N4-1R-0D0Z3axiO5kKiBsKDA18hxRMj9drguYxC3aLOv7ja0limwrA/exec'
		const form = document.forms['submit-to-google-sheet']
		const btnSent = document.querySelector('.btn-sent');

  		form.addEventListener('submit', e => {
        e.preventDefault()
        fetch(scriptURL, {
                method: 'POST',
                body: new FormData(form)
            })
            .then(function(response) {
                var frm = document.getElementsByName('submit-to-google-sheet')[0];
                frm.reset();
                console.log('Success!', response);
                alert("Your message has been sent successfully!");
            })
            .catch(error => console.error('Error!', error.message))
    	})
	</script>
</body>
</html>