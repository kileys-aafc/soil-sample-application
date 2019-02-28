<head><title>Update Project</title></head> 
<?php include '../nav-template.php'; ?>

<div class="container">
    <h1 class="display-4 text-center mb-5">Update Project</h1>
    <hr class="mb-4">
    <p class="text-muted text-center pb-2">To update a project, search by Project ID below</p>
    
    
</div>
<div class="container">
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