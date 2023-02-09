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

				<form class="login100-form validate-form col-md-6" method="post" action="index.php">
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

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input class="input100 uname" type="text" name="Username" placeholder="Username">
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
                    <div class="text-center" style="color:red">
                        Invalid Login  Credentials, Try Again!
                    </div>

					
					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login" >
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<a href="register-patron.php">
						<span>
							Doesn't have patron account?
						</span>
						<!-- Button trigger modal -->
						<span>
							Sign Up here.
						</span>
						</a>
						
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

						$select = mysqli_query($conn, "SELECT * FROM tbl_patrons WHERE patron_username = '$Username' AND patron_password = '$Pass' && Patron_Type = '$Type'");
						$row = mysqli_fetch_array($select);


						$selectAdmin = mysqli_query($conn, "SELECT * FROM tbl_adminaccess WHERE admin_username = '$Username' AND admin_password = '$Pass' && admin_type = '$Type'");
						$row2 = mysqli_fetch_array($selectAdmin);


						$selectLibrarian = mysqli_query($conn, "SELECT * FROM tbl_librarianaccess WHERE librarian_username = '$Username' AND librarian_password = '$Pass' && librarian_type = '$Type'");
						$row3 = mysqli_fetch_array($selectLibrarian);
						

						if(is_array($row)){

							$_SESSION['patron_username'] = $row['patron_username'];
							$_SESSION['patron_password'] = $row['patron_password'];
							$_SESSION['Patron_Type'] = $row['Patron_Type'];
							$_SESSION['Library_ID'] = $row['Library_ID'];
							$_SESSION['Student_ID'] = $row['Student_ID'];
							$_SESSION['Borrow_Count'] = $row['Borrow_Count'];							
							$_SESSION['Penalty'] = $row['Penalty'];
							$_SESSION['qrCode'] = $row['qrCode'];
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
							$_SESSION['email'] = $row3['email'];
							$_SESSION['id'] = $row3['id'];
							$_SESSION['profilePicture'] = $row3['profilePicture'];
							$_SESSION['librarian_type'] = $row3['librarian_type'];
							$_SESSION['contactNumber'] = $row3['contactNumber'];
							$_SESSION['street'] = $row3['street'];
							$_SESSION['barangay'] = $row3['barangay'];
							$_SESSION['municipality'] = $row3['municipality'];
							$_SESSION['province'] = $row3['province'];
								header("Location:dashboard-librarian.php");
						
						}
						 
						else{
							header("Location:indexError.php");
						}
						
					}

					

       			 ?>


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