<?php
session_start();

error_reporting(0);
if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
}
$userLoggedIn = 0;
if (isset($_SESSION['name'])) {

	$userLoggedIn = 1;
}
include('admin/includes/config.php');
include('connect.php');

// Check if user is already logged in



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit2'])) {
	// Check if the user is logged in
	if (!$userLoggedIn) {
		// User is not logged in, handle as needed (show message or redirect)
		// For example:
		// header("Location: login.php");
		// exit;
		// Or show an error message
		$error = "Please log in to book the package.";
	} else {
		//booking
		// Check if the user submitted the booking form
		if (isset($_POST['submit2'])) {
			// Assuming email is unique and can be used as an identifier
            
			// Get package details from form
			$pkgId = intval($_GET['pkgid']);
			$fromDate = $_POST['fromdate'];
			$toDate = $_POST['todate'];
			$Person = $_POST['person'];

			// Insert booking details into the database
			$conn = mysqli_connect($host, $user, $pass, $dbname);
			if ($conn) {
				$sql = "INSERT INTO tblbooking ( PackageId,UserEmail,Person, FromDate, ToDate) VALUES ( ?, ?, ?,?,?  )";
				$stmt = mysqli_prepare($conn, $sql);
				mysqli_stmt_bind_param($stmt, "ssiss", $pkgId, $email,$Person, $fromDate, $toDate);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
				mysqli_close($conn);
				$_SESSION['booking_message'] = "Booking Successful!";
				header('Location: http://localhost/travel/index.php');

				exit(); // Redirect to index.php or any other page
			} else {
				$_SESSION['booking_message'] = "Booking Failed! Please try again.";
				header('Location: http://localhost/travel/index.php');
				exit();
			}
		}
	}
}


?>
<!DOCTYPE HTML>
<html>

<head>
	<link rel="stylesheet" href="style-package.css">
	<!-- Bootstrap Link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Bootstrap Link -->
	<title>Package Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom Theme files -->

	<!--animate-->

	<script>
		new WOW().init();
	</script>
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#datepicker,#datepicker1").datepicker();
		});
	</script>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		/* Reset some default browser styles */
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		/* Custom variables */
		:root {
			--primary: #245953;
			--dark: #263A29;
			--dark-mid: #445C3C;
			--white: #ffffff;
			--pure: #A0C49D;
			--light: #D4E2D4;
			--superlight: #d9e9d9;
			--light-nude: #B2E672;
			--yellow: #F0A04B;
		}


		.pd-banner-3 h1 {
			color: var(--light);
		}

		.pd-card {
			height: 650px;
			display: flex;
			align-items: center;
			border-radius: 10px;
			border: none;
			background-color: var(--superlight);
			box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
			transition: all 0.6s ease;
			overflow: hidden;
			margin-bottom: 20px;
		}

		.pd-card .pd-card-body {
			display: flex;
		}

		.pd-card:hover {
			background-color: var(--light);
			box-shadow: rgba(0, 0, 0, 0.1) 0px 6px 16px;
			transform: translateY(-5px);
		}

		.pd-card p {
			color: var(--dark);
			font-size: 10px;
		}

		.pd-card a {
			display: inline-block;
			padding: 10px 20px;
			text-decoration: none;
			background: var(--dark);
			color: white;
			border-radius: 5px;
			transition: background-color 0.3s ease;
		}

		.pd-card a:hover {
			background-color: var(--dark);
		}

		.pd-card img {
			width: 600px;
			height: 400px;
			flex: 0 0 40%;
			padding: 20px;
		}

		.pd-card .pd-card-details {
			flex: 1;
			padding: 20px;
		}

		.pd-card h2 {
			font-size: 24px;
			font-weight: 600;
			margin-bottom: 10px;
		}

		.pd-card-right {
			padding-right: 20px;

		}

		.btn-primary {
			background-color: var(--dark-mid);
			border: none;
		}

		.btn-primary:hover {
			background-color: var(--light-nude);
		}

		.pd-card-right p {
			font-size: 16px;
			margin-bottom: 5px;
			color: var(--dark-mid);
		}

		.pd-card-right h3 {
			font-size: 18px;
			padding-bottom: 1rem;
			margin-top: 1rem;
		}

		.pd-card-right .inputLabel {
			font-weight: bold;
			margin-bottom: 5px;
			display: block;
		}

		.pd-card-right .date {
			width: 100%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 10px;
		}

		body {
			background-color: var(--dark-mid);
		}

		.pd-banner-3 h1 {
			color: var(--light);
			align-items: center;
			padding-bottom: 5rem;
			padding-top: 2rem;
		}

		.pd-card .ban-bottom {
			display: flex;
			justify-content: space-between;
			margin-top: 10px;
		}

		.pd-card .grand {
			margin-top: 20px;
			text-align: right;
		}

		/* Responsive styles for smaller screens */
		@media screen and (max-width: 768px) {
			.card {
				flex-direction: column;
			}
		}
		@media (max-width: 450px) {
    .pd-card {
		display: flex;
        flex-direction: column;
		height: auto;
    }
    
    .pd-card img {
        width: 100%;
        height: auto;
        padding: 0;
    }

    .pd-card .pd-card-right {
        padding: 20px;
    }

    .pd-card .pd-card-right .date {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
    }

	
}
	</style>
</head>

<body>

	<!-- Navbar Start -->
	<nav class="navbar navbar-expand-lg" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php" id="logo">
				<img src="images/voyage.png" alt=""><span>V</span>OYAGE</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
				<span><i class="fa-solid fa-bars"></i></span>
			</button>
			<div class="collapse navbar-collapse" id="mynavbar">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link active" href="http://localhost/travel/index.php">HOME</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="http://localhost/travel/package-list.php">PACKAGES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/travel/index.php#services">SERVICES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/travel/index.php#gallary">GALLARY</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/travel/index.php#about">ABOUT</a>
					</li>
				</ul>


				<!-- Check if user is logged in and display name or login button -->

			</div>
		</div>
	</nav>
	<!-- Navbar End -->



	<!-- top-header -->
	<?php include('includes/header.php'); ?>
	<div class="pd-banner-3" style="display: flex; align-items: center; justify-content: center;">
		<div class="container">
			<h1 style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Package Details</h1>
		</div>
	</div>
	<!--- /banner ---->
	<!--- selectroom ---->
	<div class="selectroom">
		<div class="container">
			<?php if ($error) { ?>
				<div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?></div>
			<?php } else if ($msg) { ?>
				<div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?></div>
			<?php } ?>

			<?php
			$pid = intval($_GET['pkgid']);
			$sql = "SELECT * from tbltourpackages where PackageId=:pid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':pid', $pid, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			$cnt = 1;

			if ($query->rowCount() > 0) {
				foreach ($results as $result) { ?>
					<form name="book" method="post">
						<div class="container">
							<div class="pd-card">
								<div class="pd-card-body">
									<div class="pd-card-left">
										<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
									</div>
									<div class="pd-card-right">
										<h2><?php echo htmlentities($result->PackageName); ?></h2>
										<p class="dow">#PKG-<?php echo htmlentities($result->PackageId); ?></p>
										<p><b>Package Type :</b> <?php echo htmlentities($result->PackageType); ?></p>
										<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation); ?></p>
										<p><b>Features</b> <?php echo htmlentities($result->PackageFetures); ?></p>

										<h3>Package Details</h3>
										<p><?php echo htmlentities($result->PackageDetails); ?></p>
                                       
										<div class="bnr-right">
											<label class="inputLabel">Person :</label>
											<input class="person" id="datepicker" type="number" placeholder="Number of Guest" name="person" required="" min="1">
										</div>
										<div class="bnr-right">
											<label class="inputLabel">From:</label>
											<input class="date" id="datepicker" type="date" placeholder="dd-mm-yyyy" name="fromdate" required="">
										</div>
										<div class="bnr-right">
											<label class="inputLabel">To:</label>
											<input class="date" id="datepicker1" type="date" placeholder="dd-mm-yyyy" name="todate" required="">
										</div>

										<!-- Check if user is logged in and show appropriate content -->

										<form action="" method="post">
											<button type="submit" name="submit2" class="btn-primary btn">Confirm Booking</button>
										</form>

										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</form>
			<?php }
			} ?>
		</div>
	</div>
	<!--- /selectroom ---->
	<!--- /selectroom ---->
	<<!--- /footer-top ---->


		<?php include('includes/footer.php'); ?>
		<!-- signup -->

</body>

</html>