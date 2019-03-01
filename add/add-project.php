<head><title>Add New Project</title></head> 
<?php include '../nav-template.php'; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center mb-4">Add New Project</h1>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="project-added.php" method="post">
                <h4 class="text-center mb-4">Project Info</h4>
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
                    <input class="btn btn-primary my-2" type="submit" name="submit-project" value="Add New Project"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>