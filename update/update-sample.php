<head><title>Update Sample</title></head>
<?php include '../nav-template.php'; ?>


<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Update Sample</h1>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <p class="text-muted pb-2">To update a sample, search by Sample ID below</p>
            <form action="update-sample-data" method="post"> 
                <div id="create-label-query" class="form-group">
                    <input required class="form-control" type="text" name="sample-id" placeholder="Enter Sample ID">
                </div>
                <input type="submit" class="btn btn-primary" value="Find Sample"/>
            </form>
        </div>
    </div>
</div>    

 
</body>
</html>