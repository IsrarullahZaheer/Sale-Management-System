<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Include config file
require_once "config/connectoin.php";

?>
<!DOCTYPE html>
<html dir="">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<?php

?>
		<meta name="Israrullah Zaheer" content="Code Warrior Team" />
		<title>Mobile Center</title>

		<!-- Favicon -->
		<link rel="icon" href="img/brand/favicon.png" type="image/png" />
		<!-- Fonts -->
		<!-- <link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
		/> -->

		<link rel="stylesheet" href="assets/fonts/pashto" />

		<link
			rel="stylesheet"
			href="assets/vendor/@fortawesome/fontawesome-free/css/pashtofont.css"
			type="text/css"
		/>

		<!-- Icons -->
		<link
			rel="stylesheet"
			href="assets/vendor/nucleo/css/nucleo.css"
			type="text/css"
		/>
		<link
			rel="stylesheet"
			href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
			type="text/css"
		/>
		<!-- Page plugins -->
		<link
			rel="stylesheet"
			href="assets/vendor/fullcalendar/dist/fullcalendar.min.css"
		/>
		<link
			rel="stylesheet"
			href="assets/vendor/sweetalert2/dist/sweetalert2.min.css"
		/>
		<!-- Argon CSS -->
		<link rel="stylesheet" href="css/dashboard.css" type="text/css" />
		<link rel="stylesheet" href="css/mystyle.css" />
		<link
			rel="stylesheet"
			href="assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			href="assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			href="assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css"
		/>
		<link rel="stylesheet" href="functions/function.php" />

		<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

		<style>
			body {
				overflow-x: hidden;
			}
		</style>
	</head>

	<body>
		<!-- Sidenav -->

		<!-- Main content -->
		<style>
			body {
				/* overflow-y:hidden; */

				background-image: url(img/theme/mobile2.jpg);

				/* Center and scale the image nicely */
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}

			.form__group:not(:last-child) {
				margin-bottom: 3px;
			}

			.form__input {
				font-size: 14px;
				font-family: inherit;
				color: inherit;
				padding: 12px 15px;
				border-radius: 2px;
				background-color: rgba(255, 255, 255, 0.5);
				border: none;
				border-bottom: 3px solid transparent;
				width: 100%;
				box-shadow: 0 7px 20px rgba(0, 0, 0, 0.1);
				display: block;
				transition: all 0.3s;
			}
			 @media only screen and (max-width: 56.25em) {
			 .form__input {
			   width: 100%; } }
			.form__input:focus {
				outline: none;
				box-shadow: 0 7px 20px rgba(0, 0, 0, 0.1);
				border-bottom: 3px solid #7ed56f;
			}
			.form__input:focus:invalid {
				border-bottom: 3px solid #ff7730;
			}
			.form__input::-webkit-input-placeholder {
				color: #999;
			}

			.form__label {
				font-size: 14px;
				font-weight: 700;
				margin-left: 20px;
				margin-top: 5px;
				display: block;
				transition: all 0.3s;
			}

			.form__input:placeholder-shown + .form__label {
				opacity: 0;
				visibility: hidden;
				transform: translateY(-40px);
			}
		</style>

		<!-- <div class="main-content" id=""> -->
		<!-- Topnav -->


<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "config/connectoin.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
// $link = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    $pic = trim($_POST["mpic"]);
    // $Pic = $_FILES['mpic']['name'];
    // $PicTmp = $_FILES['mpic']['tmp_name'];

    // move_uploaded_file($PicTmp, "img/theme/$Pic");
    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, pic) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_pic);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_pic = $pic;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($connection);
}

?>


		<div class="container pb-2 text-gray">
				<div class="row justify-content-center">

					<div class="col-lg-5 col-md-7 mt-6">
						<div class="card bg-secondary border border-soft mb-0">
							<div class="card-header bg-transparent">
								<div class="btn-wrapper text-center">
									<div class="media">
										<img
											class="avatar rounded-circle mx-auto"
											src="img/theme/israr.jpg"
											alt="img"
											style="height: 100px; width: 100px;"
										/>
									</div>
								</div>
							</div>
							<h3
								class="text-center text-dark form__label mt-4"
								style="font-size: 22px;margin-left:-2px;"
							>
                            Sign Up

							</h3>

							<div class="card-body px-lg-5 py-lg-5">
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
									<div class="form__group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

                                        <input type="text" name="username" class="form__input" id="username" Placeholder="User Name" value="<?php echo $username; ?>" required>


										<label for="username" class="text-danger">
                                            <?php echo $username_err; ?></label>
										<!-- <span class="help-block text-danger">
                                            </span> -->
									</div>

									<div class="form__group  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
										<input
											type="password"
											name="password"
											class="form__input"
											id="password"
											placeholder="Password"
                                            required
										/>

										<label for="password" class=" text-danger"><?php echo $password_err; ?></label>

									</div>

                                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

                <input type="password" name="confirm_password" 	id="confirmpassword"
											placeholder="Confirm Password" class="form__input" value="<?php echo $confirm_password; ?>"required>
                <label for="confirmpassword"class="text-danger"><?php echo $confirm_password_err; ?></label>
            </div>
            <div class="form-group mb-3">
											<div class="custom-file">
												<input
													name="mpic"
													type="file"
													class="custom-file-input"
													id="mpic"
													lang="en"
												/>
												<label class="custom-file-label" for="mpic"
													>عکس</label
												>
											</div>
										</div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Submit">

            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>



								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<!-- <?php include "includes/footer.php";?> -->
	</body>
</html>
