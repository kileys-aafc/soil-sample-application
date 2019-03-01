<title>CanSIS Soil Sample Archive</title>
<?php include 'nav-template.php';?>
<main role="main" class="container">
	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="display-4"><strong>CanSIS Soil Sample Archive</strong></h1>
			<div class="row justify-content-center">
			<div class="col-md-7">
				<p class="lead text-muted">This application allows you to query and manage the contents of the CanSIS Soil Sample Archive</p>
			</div>
		</div>
	</section>
	<div class="card-deck">
		<div class="card">    
					<i class="fas fa-search bg-secondary text-center text-light py-4" style="font-size: 1000%"></i>
		<div class="card-body">
				<h5 class="card-title">Search Database</h5>
				<p class="card-text">Query soil samples currently stored in the database</p>
				<p><a class="btn btn-secondary" href="/query/query-sample.php" role="button">View details</a></p>
			</div>
		</div>
		<div class="card">
		<i class="fas fa-qrcode bg-secondary text-center text-light py-4" style="font-size: 1000%"></i>
			<div class="card-body">
				<h5 class="card-title">Scan Samples</h5>
				<p class="card-text">Scan and retrieve sample data from the warehouse</p>
				<p><a class="btn btn-secondary" href="/scan/scan-sample.php" role="button">View details</a></p>
			</div>
		</div>
		<div class="card">
		<i class="far fa-question-circle bg-secondary text-center text-light py-4" style="font-size: 1000%"></i>
			<div class="card-body">
				<h5 class="card-title">About the Archive</h5>
				<p class="card-text">Information about the database and warehouse storage</p>
				<p><a class="btn btn-secondary" href="/about/info.php" role="button">View details</a></p>
			</div>
		</div>
	</div>
</main>
</body>    
</html>