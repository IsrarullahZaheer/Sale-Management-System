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



<?php
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: login.php");
//     exit;
// }

// Include config file
require_once "config/connectoin.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must have atleast 6 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
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
                            Reset Password

							</h3>

							<div class="card-body px-lg-5 py-lg-5">
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
                                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form__input" value="<?php echo $new_password; ?>">
                <span class="text-danger"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form__input">
                <span class="text-danger"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="#">Cancel</a>
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