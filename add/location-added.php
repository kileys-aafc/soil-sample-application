<head><title>Location Added</title></head>
<?php
include '../nav-template.php'; 
include '../functions/check-admin.php';
check_admin();
include("../functions/redirect-homepage.php");
?>

<?php
    if(isset($_POST['add-location'])){
        $loc_id = $_POST['loc_id'];
        $lat_dd = $_POST['lat_dd'];
        $long_dd = $_POST['long_dd'];
        $loc_acc = $_POST['loc_acc'];
        $map_unit = $_POST['map_unit'];
        $subgroup = $_POST['subgroup'];
        $series = $_POST['series'];  
          
        require_once('../db-connect.php');
    
       
        $insert_location = "INSERT INTO location_info (`loc_id`,`lat_dd`, `long_dd`,`loc_acc`, `map_unit`, `subgroup`, `series`) VALUES (?,?,?,?,?,?,?)";

        $stmt = mysqli_prepare($dbc, $insert_location);
        mysqli_stmt_bind_param($stmt,"idddsss", $loc_id, $lat_dd, $long_dd, $loc_acc, $map_unit, $subgroup, $series);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);        
        
        if($affected_rows==1){

            echo 
            '<div class="container">
                <div class="row justify-content-center">
                <h4 class="mb-3 text-success">Location Added!</h4>
                </div>
                <div class="row justify-content-center">
                    <p class="mb-4 mt-2">Here is the new Location data.</p>
                </div>
            </div>
            ';

            echo'
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <p><strong>Location Info</strong></p>
                    <table class="table table-secondary table-striped table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th>Location ID</th>
                                <td>'.$loc_id.'</td>
                            </tr>
                            <tr>
                                <th scope="row">Latitude</th>
                                <td>'.$lat_dd.'</td>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <td>'.$long_dd.'</td>
                            </tr>
                            <tr>
                                <th>Map Unit</th>
                                <td>'.$loc_acc.'</td>
                            </tr>
                            <tr>
                                <th>Map Unit</th>
                                <td>'.$map_unit.'</td>
                            </tr>
                            <tr>
                                <th>Subgroup</th>
                                <td>'.$subgroup.'</td>
                            </tr>
                            <tr>
                                <th>Series</th>
                                <td>'.$series.'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <a href="add-location.php"><button class="btn btn-primary">Back</button></a>
            </div>';
          
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        
        
        }
        else{
            
            echo'
            <div class="row justify-content-center">
                <h4 class="mb-3"><strong class="text-danger">Error! </strong>Location ID <strong>'.$loc_id.'</strong> already exists!</h4>
            </div>
            <div class="row justify-content-center">
                <p>Here is the data you attempted to enter:</p> 
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2 mt-4">
                    <p><strong>Location Info</strong></p>
                    <table class="table table-secondary table-striped table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th>Location ID</th>
                                <td>'.$loc_id.'</td>
                            </tr>
                            <tr>
                                <th scope="row">Latitude</th>
                                <td>'.$lat_dd.'</td>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <td>'.$long_dd.'</td>
                            </tr>
                            <tr>
                                <th>Map Unit</th>
                                <td>'.$map_unit.'</td>
                            </tr>
                            <tr>
                                <th>Map Unit</th>
                                <td>'.$loc_acc.'</td>
                            </tr>
                            <tr>
                                <th>Subgroup</th>
                                <td>'.$subgroup.'</td>
                            </tr>
                            <tr>
                                <th>Series</th>
                                <td>'.$series.'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <a href="add-location.php"><button class="btn btn-primary">Back</button></a>
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