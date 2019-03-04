<head><title>Update Location</title></head> 
<?php include '../nav-template.php'; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Update Location</h1>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
    <p class="text-muted text-center pb-2">To update a location, search by Location ID below</p>
    <form action="update-location-data.php" method="post">
        <div class="row justify-content-center">
            <div class="col-4">               
                <div id="create-label-query" class="form-group">
                    <input required class="form-control" type="text" name="update-location-id" placeholder="Enter Location ID">
                </div>
                <input type="submit" class="btn btn-primary" value="Find Location"/>
            </div>
        </div>
    </form>
</div>
</body>
</html>