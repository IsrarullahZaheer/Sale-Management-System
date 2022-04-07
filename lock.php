
	<?php

// Initialize the session
session_start();

// // Unset all of the session variables
// $_SESSION = array();

// // Destroy the session.
// session_destroy();

// // // Redirect to login page
// // header("location: lock.php");

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
		<title>Lock Screen</title>

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

// if (isset($_POST['login'])) {
//     $userEmail = mysqli_real_escape_string($connection, $_POST['username']);
//     $password = mysqli_real_escape_string($connection, $_POST['password']);

//     $query = "SELECT * FROM users WHERE user_email = '$userEmail'";
//     $selectUserQuery = mysqli_query($connection, $query);

//     while ($rows = mysqli_fetch_array($selectUserQuery)) {
//         $db_userID = $rows['user_id'];
//         $db_userName = $rows['user_name'];

//         $db_userEmail = $rows['user_email'];
//         $db_userFirstname = $rows['user_firstname'];
//         $db_userLastname = $rows['user_lastname'];
//         $db_userPassword = $rows['user_password'];

//     }

// // checks if users and password correct
//     {
//         if ($userEmail === $db_userEmail && $password === $db_userPassword) {

//             $_SESSION['username'] = $db_userName;
//             $_SESSION['user_firstname'] = $db_user_firstname;
//             $_SESSION['user_lastname'] = $db_user_lastname;
//             // $_SESSION['user_lastname'] = $db_user_lastname;
//             header("Location:index.php");
//         } else {

//             header("Location:login.php");
//         }
//     }

// }

?>
<?php
// Initialize the session
// session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "config/connectoin.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    // if (empty(trim($_POST["username"]))) {
    //     $username_err = "Please enter username.";
    // } else {
    //     $username = trim($_POST["username"]);
    // }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $_SESSION['username'];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $param_username;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
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
















		<!-- Main content -->
		<div class="main-content">
			<!-- Header -->
			<div class="header py-7 py-lg-8 pt-lg-2">

			<!-- Page content -->
			<div class="container mt-4 pb-5">
				<div class="row justify-content-center">
					<div class="col-lg-5 col-md-7">
						<div class="card card-profile bg-secondary mt-5 border border-soft">
							<div class="row justify-content-center">
								<div class="col-lg-3 order-lg-2">
									<div class="card-profile-image">
										<img
											src="img/theme/israr.jpg"
											class="rounded-circle border-secondary"
											width="150"
											height="150"
										/>
									</div>
								</div>
							</div>
							<div class="card-body pt-7 px-5">
								<div class="text-center mb-4"><h3>Israrullah</h3></div>
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"method="POST"  role="form">
									<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
										<div
											class="input-group input-group-merge input-group-alternative"
										>
											<div class="input-group-prepend">
												<span class="input-group-text"
													><i class="ni ni-lock-circle-open"></i
												></span>
											</div>
											<input

												class="form-control"
												placeholder="Password"
												type="password"
												name="password"
												for="password"
											/>
												</div>
												<label for="password" class=" text-danger"><?php echo $password_err; ?></label>

									</div>
									<div class="text-center">
										<input type="submit" name="login" value="Unlock" class="btn btn-primary mt-2">


									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

	</body>
</html>
