<head><title>Add New Project</title></head> 
<?php include '../nav-template.php'; ?>

<div class="container" id="add-project">
    <h1 class="display-4 text-center mb-4">Add New Project</h1>
    <div class="row justify-content-center">
        <div class="col-sm-5 mt-4">
            <form action="project-added.php" method="post">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="project_id">Project ID</label>
                    <div class="col-sm-8">
                        <input class="form-control" required type="text" name="proj_id" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="project_name">Project Name</label>
                    <div class="col-sm-8">
                        <input class="form-control" required type="text" name="proj_name" value="" />
                    </div>
                </div>
                <div class="text-center"> 
                    <input class="btn btn-primary" type="submit" name="submit-project" value="Add New Project"/>
                </div>
            </form>
        
        
</div>
</body>
</html>