<head><title>Update Project</title></head>
<?php 
include '../nav-template.php'; 
include '../functions/check-admin.php';
check_admin();
?>
<div class="container">
    <h1 class="display-4 text-center mb-5">Update Project</h1>
    <hr class="mb-4">
</div>
<div class="container">
<form class="justify-content-center" action="project-updated.php" method="post">

    <?php
    require '../db-connect.php';
    if(isset($_POST['update-project-id'])){
        $proj_id = $_POST['update-project-id'];
        $query_projects = "SELECT * FROM projects WHERE proj_id ='$proj_id'";
        $response = @mysqli_query($dbc, $query_projects);
        if($response){
            //-- check if record exist  
            if(mysqli_num_rows($response)>0){
                if ($row_projects = mysqli_fetch_array($response)){                      
                echo'
                <div class="row justify-content-center">
                    <div class="col-sm-4 mt-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="project_id">Project ID</label>
                            <div class="col-sm-8">
                                <input class="form-control" required type="text" name="proj_id" value="'.$proj_id.'" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="project_name">Project Name</label>
                            <div class="col-sm-8">
                                <input class="form-control" required type="text" name="proj_name" value="'.$row_projects['proj_name'].'" />
                            </div>
                        </div>
                    </div>
                </div>
                ';  
                }      
            }

            else{
                
                echo"ERROR: No entries found. Please check the value you entered.</br>
                You have entered Project ID: <b>'.$proj_id.'</b>";
                echo mysqli_error($dbc)."</br>";
            }
                  
        }
            else{    
                echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            }   

            
    }    
    
    mysqli_close($dbc);
        

?>
    <!-- Submit -->
    <div class="text-center my-5" name="submit"> 
        <input class="btn btn-danger" type="submit" name="update-project" value="Update Project" />
    </div>
    
</form>
</div> 
</body>   
</html>
