<head><title>Project Added</title></head>
<?php
    include("../nav-template.php"); 
    include("../functions/redirect-homepage.php");
?>

<?php
    if(isset($_POST['submit-project'])){
        $data_missing = array();
        $proj_id = trim($_POST['proj_id']);
        $proj_name = trim($_POST['proj_name']);  
        
       
        require_once('../db-connect.php');
    
       
        $projectInsert="INSERT INTO `projects` (`proj_id`,`proj_name`) VALUES (?,?)";

        $stmt = mysqli_prepare($dbc, $projectInsert);
        mysqli_stmt_bind_param($stmt,"is", $proj_id, $proj_name);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);        
        
        if($affected_rows==1){

            echo 
            '<div class="container">
                <div class="row justify-content-center">
                    <p class="h3 text-success">Project Added!</p>
                </div>
                <div class="row justify-content-center">
                    <p class="mb-4 mt-2">Here is the new project data.</p>
                </div>
            </div>
            ';

            echo'
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <p><strong>Projects</strong></p>
                    <table class="table table-secondary table-striped table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th>Project ID</th>
                                <td>'.$proj_id.'</td>
                            </tr>
                            <tr>
                                <th scope="row">Project Name</th>
                                <td>'.$proj_name.'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <a href="add-project.php"><button class="btn btn-primary">Back</button></a>
            </div>';
          
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        
        
        }
        else{
            
            echo'
            <div class="row justify-content-center">
                <p><strong class="text-danger">Error Occurred! </strong>Project ID <strong>'.$proj_id.'</strong> already exists.</p>
            </div>
            <div class="row justify-content-center">
                <p>Here is the data you attempted to enter:</p> 
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2 mt-4">
                    <p><strong>Project Info</strong></p>
                    <table class="table table-secondary table-striped table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th>Project ID</th>
                                <td>'.$proj_id.'</td>
                            </tr>
                            <tr>
                                <th scope="row">Project Name</th>
                                <td>'.$proj_name.'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <a href="add-project.php"><button class="btn btn-primary">Back</button></a>
            </div>';
            
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }
    }
    else{
        redirect_homepage();
    }
?>
</body>
</html>