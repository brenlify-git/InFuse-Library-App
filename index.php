<?PHP

session_start();
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>InFuse | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/img/logo.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor-login/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts-login/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor-login/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor-login/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor-login/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

	<!--===============================================================================================-->
</head>

<body>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/img/Logo_Login.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="index.php">
					<span class="login100-form-title">
						Welcome back, Nationalian!
						<span class="login100-form-subtitle">
							Login your credentials here.
						</span>
					</span>

					<div class="wrap-input100 ml-2">
						<label>
							<input type="radio" name="type" value="PATRON"> Patron
						</label> 

						<label>
							<input type="radio" name="type" value="LIBRARIAN"> Librarian
						</label> 

						<label>
							<input type="radio" name="type" value="ADMIN"> Admin
						</label>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="Username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="Pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login" >
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot Password |
						</span>
						<!-- Button trigger modal -->
						<span class="txt2" data-toggle="modal" data-target="#exampleModalCenter">
							Contact Admin
						</span>


					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="https://national-u.edu.ph/" target="_blank">
							Take a look to the current happenings.
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>

			</div>
		</div>
	</div>

			<?php 
					if(isset($_POST['login'])){
						$Username = $_POST['Username'];
						$Pass = $_POST['Pass'];
						$Type = $_POST['type'];

						$select = mysqli_query($conn, "SELECT * FROM tbl_patronaccess WHERE patron_username = '$Username' AND patron_password = '$Pass' && patron_type = '$Type'");
						$row = mysqli_fetch_array($select);


						$selectAdmin = mysqli_query($conn, "SELECT * FROM tbl_adminaccess WHERE admin_username = '$Username' AND admin_password = '$Pass' && admin_type = '$Type'");
						$row2 = mysqli_fetch_array($selectAdmin);


						$selectLibrarian = mysqli_query($conn, "SELECT * FROM tbl_librarianaccess WHERE librarian_username = '$Username' AND librarian_password = '$Pass' && librarian_type = '$Type'");
						$row3 = mysqli_fetch_array($selectLibrarian);
						

						if(is_array($row)){

							$_SESSION['patron_username'] = $row['patron_username'];
							$_SESSION['patron_password'] = $row['patron_password'];
							$_SESSION['patron_type'] = $row['patron_type'];
								header("Location:dashboard-student.php");

						}

						else if(is_array($row2)){

							$_SESSION['admin_username'] = $row2['admin_username'];
							$_SESSION['admin_password'] = $row2['admin_password'];
							$_SESSION['email'] = $row2['email'];
							$_SESSION['id'] = $row2['id'];
							$_SESSION['profilePicture'] = $row2['profilePicture'];
							$_SESSION['admin_type'] = $row2['admin_type'];
							$_SESSION['contactNumber'] = $row2['contactNumber'];
							$_SESSION['street'] = $row2['street'];
							$_SESSION['barangay'] = $row2['barangay'];
							$_SESSION['municipality'] = $row2['municipality'];
							$_SESSION['province'] = $row2['province'];
								header("Location:dashboard.php");
						
						}
						else if(is_array($row3)){

							$_SESSION['librarian_username'] = $row3['librarian_username'];
							$_SESSION['librarian_password'] = $row3['librarian_password'];
							$_SESSION['librarian_type'] = $row3['librarian_type'];
								header("Location:dashboard-librarian.php");
						
						}
						 
						else{
							echo '<script type = "text/javascript">';
							echo 'alert("Invalid Username or Password!");';
							echo 'window.location.href = "index.php"';
							echo '</script>';
						}
						
					}

					

       			 ?>


	</div>
	</div>
	</div>





	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"> <i class="bi bi-telephone-forward"></i> &nbsp
						Oops, oh no!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="text-align: justify;">
					&nbsp We are sorry to here that. If you've lost your password or wish to reset it, request an
					account resetting from our admin to assist you.
					<br><br>
					&nbspIf you did not request a password reset, you can safely ignore this modal.
					<br><br>
					&nbspOnly a person with access to your email can reset your account password.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning btn-block ml-1" data-dismiss="modal">I
						understand</button>
				</div>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="vendor-login/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor-login/bootstrap/js/popper.js"></script>
	<script src="vendor-login/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor-login/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor-login/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="assets/js/login.js"></script>

</body>

</html>