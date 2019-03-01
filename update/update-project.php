<head><title>Update Project</title></head> 
<?php include '../nav-template.php'; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Update Project</h1>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
<p class="text-muted text-center pb-2">To update a project, search by Project ID below</p>
    <form action="update-project-data.php" method="post">
        <div class="row justify-content-center">
            <div class="col-4">               
                <div id="create-label-query" class="form-group">
                    <label for="update-project-id">Project ID</label>  
                    <input required class="form-control" type="text" name="update-project-id" placeholder="Enter Project ID">
                </div>
                <input type="submit" class="btn btn-primary" value="Find Project"/>
            </div>
        </div>
    </form>
</div>
</body>
</html>