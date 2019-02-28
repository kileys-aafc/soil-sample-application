<head><title>Update Location</title></head> 
<?php include '../nav-template.php'; ?>

<div class="container">
    <h1 class="display-4 text-center mb-5">Update Location</h1>
    <hr class="mb-4">
    <p class="text-muted text-center pb-2">To update a location, search by Location ID below</p>
</div>
<div class="container">
    <form action="update-location-data.php" method="post">
        <div class="row justify-content-center">
            <div class="col-4">               
                <div id="create-label-query" class="form-group">
                    <label for="update-location-id">Location ID</label>  
                    <input required class="form-control" type="text" name="update-location-id" placeholder="Enter Location ID">
                </div>
                <input type="submit" class="btn btn-primary" value="Find Location"/>
            </div>
        </div>
    </form>
</div>
</body>
</html>