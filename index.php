<title>CanSIS Soil Sample Archive</title>
<?php include 'nav-template.php';?>
<main role="main" class="container">
	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="display-4"><strong>CanSIS Soil Sample Archive</strong></h1>
			<div class="row justify-content-center">
				<div class="col-md-7">
					<p class="lead text-muted">This application allows you to query and manage the contents of the
						CanSIS Soil Sample Archive</p>
				</div>
			</div>
	</section>
	<div class="container">
		<div class="row mb-5">
			<div class="card-deck w-100">
				<div class="card">
					<i class="fas fa-search bg-secondary text-center text-light py-4" style="font-size: 800%"></i>
					<div class="card-body">
						<h5 class="card-title">Search Database</h5>
						<p class="card-text">Query soil samples currently stored in the database</p>
						<p><a class="btn btn-secondary" href="/query/query-database.php" role="button">View details</a>
						</p>
					</div>
				</div>
				<div class="card">
					<i class="fas fa-qrcode bg-secondary text-center text-light py-4" style="font-size: 800%"></i>
					<div class="card-body">
						<h5 class="card-title">Scan Samples</h5>
						<p class="card-text">Scan and retrieve sample data from the warehouse</p>
						<p><a class="btn btn-secondary" href="/scan/scan-sample.php" role="button">View details</a></p>
					</div>
				</div>
				<div class="card">
					<i class="far fa-question-circle bg-secondary text-center text-light py-4"
						style="font-size: 800%"></i>
					<div class="card-body">
						<h5 class="card-title">About the Archive</h5>
						<p class="card-text">Information about the database and warehouse storage</p>
						<p><a class="btn btn-secondary" href="/about/info.php" role="button">View details</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if ($_SESSION['admin'] == 1) {
	//-- Display if admin
    echo '
	<div class="container">
		<div class="row mb-5">
			<div class="card-deck w-100">
				<div class="card">
					<i class="fas fa-database bg-secondary text-center text-light py-4" style="font-size: 800%"></i>
					<div class="card-body">
						<h5 class="card-title">Add New Data</h5>
						<p class="card-text">Add new sample, location, or project data to the archive database</p>
						<p><a class="btn btn-secondary" href="/add/add-data.php" role="button">View details</a></p>
					</div>
				</div>
				<div class="card">
					<i class="fas fa-edit bg-secondary text-center text-light py-4" style="font-size: 800%"></i>
					<div class="card-body">
						<h5 class="card-title">Update Data</h5>
						<p class="card-text">Update sample, location, or project data currently within the archive
							database</p>
						<p><a class="btn btn-secondary" href="/update/update-data.php" role="button">View details</a>
						</p>
					</div>
				</div>
				<div class="card">
					<i class="fas fa-users bg-secondary text-center text-light py-4"
						style="font-size: 800%"></i>
					<div class="card-body">
						<h5 class="card-title">Manage Users</h5>
						<p class="card-text">Manage user accounts and passwords</p>
						<p><a class="btn btn-secondary" href="/about/info.php" role="button">View details</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	';}?>
</main>
</body>

</html>