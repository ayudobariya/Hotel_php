<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php require('inc/links.php'); ?>
	<title><?php echo $settings_r['site_title'] ?> - CONTACT</title>

	<style>
		.h-line {
			width: 150px;
			margin: 0 auto;
			height: 1.7px;
		}


		/* .pop:hover {
      border-top-color: var(--teal) !important;
      transform: scale(1.03);
      transition: all 0.3s;
    } */
	</style>
</head>

<body class="bg-light">

	<?php require('inc/header.php'); ?>

	<div class="my-5 px-4">
		<h2 class="fw-bold h-font text-center">CONTACT US</h2>
		<div class="h-line bg-dark"></div>
		<p class="text-center mt-3">
			Lorem ipsum dolor, sit amet consectetur adipisicing elit.
			Reiciendis soluta eaque at velit tenetur <br> exercitationem magni incidunt
			iste, qui libero, ex, labore quidem sit esse.
		</p>
	</div>



	<div class="container">
		<div class="row">

			<div class="col-lg-6 col-md-6 mb-5 px-4">
				<div class="bg-white rounded shadow p-4">

					<iframe class="w-100 rounded mb-4" height="329px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

					<h5>Address</h5>
					<a href="<?php echo $contact_r['gmap'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
						<i class="bi bi-geo-alt-fill"></i>
						<?php echo $contact_r['address'] ?>
					</a>

					<h5 class="fw-bold mt-4">Call us</h5>
					<a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark font-weight">
						<i class="bi bi-telephone-fill"></i> +
						<?php echo $contact_r['pn1'] ?>
					</a>
					<br>
					<?php
					if ($contact_r['pn2'] != '') {
						echo <<<data
                <a href="tel: +$contact_r[pn2]" class="d-inline-block text-decoration-none text-dark font-weight">
                  <i class="bi bi-telephone-fill"></i> +$contact_r[pn2]
                </a>
data;
					}
					?>

					<h5 class="mt-4">Email</h5>
					<a href="mailto: <?php echo $contact_r['email'] ?>" class="d-inline-block text-decoration-none text-dark font-weight">
						<i class="bi bi-envelope-fill"></i>
						<?php echo $contact_r['email'] ?>
					</a>

					<h5 class="fw-bold mt-4">Follow us</h5>
					<?php
					if ($contact_r['tw'] != '') {
						echo <<<data
                <a href="$contact_r[tw]" target="_blank" class="d-inline-block text-dark fs-5 me-2">
                  <i class="bi bi-twitter me-1"></i>
                </a>
data;
					}
					?>

					<a href="<?php echo $contact_r['fb'] ?>" target="_blank" class="d-inline-block text-dark fs-5 me-2">
						<i class="bi bi-facebook me-1"></i>
					</a>
					<a href="<?php echo $contact_r['insta'] ?>" target="_blank" class="d-inline-block text-dark fs-5">
						<i class="bi bi-instagram me-1"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 px-4">
				<div class="bg-white rounded shadow p-4">
					<form method="POST">
						<h5>Send a message</h5>
						<div class="mt-3">
							<label class="form-label" style="font-weight: 500;">Name</label>
							<input name="name" required type="text" class="form-control shadow-none">
						</div>
						<div class="mt-3">
							<label class="form-label" style="font-weight: 500;">Email</label>
							<input name="email" required type="email" class="form-control shadow-none">
						</div>
						<div class="mt-3">
							<label class="form-label" style="font-weight: 500;">Subject</label>
							<input name="subject" required type="text" class="form-control shadow-none">
						</div>
						<div class="mt-3">
							<label class="form-label" style="font-weight: 500;">Message</label>
							<textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
						</div>
						<button type="submit" name="send" class="btn text-white custom-bg mt-3">SEND</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	if (isset($_POST['send'])) {
		$frm_data = filteration($_POST);

		$q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
		$values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];

		$res = insert($q, $values, 'ssss');
		if ($res == 1) {
			alert('success', 'Mail sent!');
		} else {
			alert('error', 'Server Down! Try again later.');
		}
	}
	?>

	<?php require('inc/footer.php'); ?>


</body>

</html>