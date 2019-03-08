<title>Add Data</title>
<?php include '../nav-template.php';?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Add New Data</h1>
            <p class="lead text-muted text-center pt-2">Add new project, location, or sample data to the database</p>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="card-deck">
            <div class="card">    
                        <i class="fas fa-project-diagram bg-secondary text-center text-light py-4" style="font-size: 800%"></i>
            <div class="card-body">
                    <h5 class="card-title">Add Project</h5>
                    <p class="card-text text-nowrap">Add new project to the database</p>
                    <p><a class="btn btn-secondary" href="add-project.php" role="button">View details</a></p>
                </div>
            </div>
            <div class="card">
            <i class="fas fa-map-marker-alt bg-secondary text-center text-light py-4" style="font-size: 800%"></i>
                <div class="card-body">
                    <h5 class="card-title">Add Location</h5>
                    <p class="card-text text-nowrap">Add new location to the database</p>
                    <p><a class="btn btn-secondary" href="add-location.php" role="button">View details</a></p>
                </div>
            </div>
            <div class="card">
            <i class="fas fa-warehouse bg-secondary text-center text-light py-4" style="font-size: 800%"></i>
                <div class="card-body">
                    <h5 class="card-title">Add Sample</h5>
                    <p class="card-text text-nowrap">Add sample data to the database</p>
                    <p><a class="btn btn-secondary" href="add-sample.php" role="button">View details</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>    
</html>