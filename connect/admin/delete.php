<head><title>Delete Sample Data</title></head>
<?php
     include '../index.php';  
    include("../functions/redirect_homepage.php");
   
    include("../functions/check_admin.php");
    require '../dbConnect.php';
    check_admin();
?>

<main role="main" class="container">
<h1 class="display-4 text-center">Delete Samples</h1>
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-4">          
            <form action="delete2.php" method="post">  
                <div class="form-group" id="delete-record">      
                    
                    <input required class="form-control mt-4" type="text" name="idanswer" placeholder="Enter Sample ID">
                </div>
                <input class="btn btn-primary" type="submit" value="Find This Sample">
            </form>
        </div>
    </div>
</div> 
</body>
</html>