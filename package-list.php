<?php
session_start();
error_reporting(0);
include('admin/includes/config.php');
include('includes/config.php');

?>

<!DOCTYPE HTML>
<html>

<head>

	<title> Package List</title>

	<link rel="stylesheet" href="style-package.css">
	<!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Link -->

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


	<div class="page-container">
		<!-- Include your header and sidebar here -->


		<div class="left-content">
			<div class="mother-grid-inner">
				<div class="packages-container">
					<!-- Main content area -->
					<?php
					$sql = "SELECT * FROM TblTourPackages";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					if ($query->rowCount() > 0) {
						foreach ($results as $result) {
					?>
							<div class="pl-card packages">
								<div class="pl-card-img">
									<img src="images/<?php echo htmlentities($result->PackageImage); ?>" alt="<?php echo htmlentities($result->PackageName); ?>">
								</div>
								<div class="pl-card-details">
									<h3><?php echo htmlentities($result->PackageName); ?></h3>
									<p>Type: <?php echo htmlentities($result->PackageType); ?></p>
									<p>Location: <?php echo htmlentities($result->PackageLocation); ?></p>
									<p>Price: <?php echo htmlentities($result->PackagePrice); ?></p>
									<p>Features: <?php echo htmlentities($result->PackageFetures); ?></p>
									<h6>Price: <strong><?php echo htmlentities($result->PackagePrice); ?> BDT/Person</strong></h6>
									<form action="" method="post">
										<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>" name="details" class="view">Details</a>
									</form>
								</div>
							</div>
					<?php
						}
					} else {
						echo "No packages found.";
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- Include your JavaScript files here -->
</body>

</html>