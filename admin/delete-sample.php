<head><title>Delete Sample Data</title></head>
<?php
     include '../nav-template.php';  
    include("../functions/redirect-homepage.php");
   
    include("../functions/check-admin.php");
    require '../db-connect.php';
    check_admin();
?>

<main role="main" class="container">
<h1 class="display-4 text-center">Delete Sample</h1>
<div class="container">
    <div class="row justify-content-center my-4">
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