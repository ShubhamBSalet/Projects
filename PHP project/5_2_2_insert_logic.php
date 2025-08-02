<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ID Card</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// session_start();
		session_start();
		include "_dbconnect.php";

		$en = $_POST['en'];
		$name = $_POST['name'];
		$sem = $_POST['sem'];
		$check_en = $_SESSION['Enrollment'];

		if (isset($_POST['submit']) && isset($_FILES['my_image']) && $en == $check_en) {

			echo "<pre>";
			print_r($_FILES['my_image']);
			echo "</pre>";

			$img_name = $_FILES['my_image']['name'];
			$img_size = $_FILES['my_image']['size'];
			$tmp_name = $_FILES['my_image']['tmp_name'];
			$error = $_FILES['my_image']['error'];

			if ($error === 0) {
				if ($img_size > 125000) {
					$em = "Sorry, your file is too large.";
				} else {
					$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
					$img_ex_lc = strtolower($img_ex);

					$allowed_exs = array("jpg", "jpeg", "png");

					if (in_array($img_ex_lc, $allowed_exs)) {
						$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
						$img_upload_path = 'uploads/' . $new_img_name;
						move_uploaded_file($tmp_name, $img_upload_path);

						$sql = "INSERT INTO `std_data` (`enrollment`, `name`, `sem`, `img`) VALUES ('$en', '$name', '$sem', '$new_img_name');";

						mysqli_query($conn, $sql);
						echo "successfully";
					} else {
						echo "You can't upload files of this type";
					}
				}
			} else {
				echo "unknown error occurred!";
			}

		} else {
			echo "Please enter your enrollment";
		}
	} else {
		echo '<div class="jumbotron my-5 mx-5">
            <center><h1 class="display-4">Error...!</h1>
            <p class="lead">Sorry, You are not Sign In.</p>
            <hr class="my-4">
            <p>Click here to Sign In</p>
            <a class="btn btn-outline-danger btn-lg" href="2_Sign_in.php" role="button">Sign In</a><center>
        </div>';
	}

	?>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
	</body>

</html>