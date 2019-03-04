<head><title>Delete Sample</title></head>
<?php
     include '../nav-template.php';  
    include("../functions/redirect-homepage.php");
   
    include("../functions/check-admin.php");
    require '../db-connect.php';
    check_admin();
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Delete Sample</h1>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
    <p class="text-muted text-center pb-2">To delete a sample, enter sample ID below</p>
    <div class="row justify-content-center my-2">
        <div class="col-4">          
            <form action="delete-sample-data.php" method="post">  
                <div class="form-group">      
                    <input required class="form-control mt-4" type="text" name="delete-sample-id" placeholder="Enter Sample ID">
                </div>
                <input class="btn btn-primary" type="submit" value="Find Sample">
            </form>
        </div>
    </div>
</div> 
</body>
</html>