<head><title>Update Location</title></head>
<?php 
include '../nav-template.php'; 
include '../functions/check-admin.php';
check_admin();
?>
<div class="container">
    <h1 class="display-4 text-center mb-5">Update Location</h1>
    <hr class="mb-4">
</div>
<div class="container">
<form class="justify-content-center" action="location-updated.php" method="post">

    <?php
    require '../db-connect.php';
    if(isset($_POST['update-location-id'])){
        $loc_id = $_POST['update-location-id'];
        $query_location_info = "SELECT * FROM location_info WHERE loc_id ='$loc_id'";
        $response = @mysqli_query($dbc, $query_location_info);
        if($response){
            //-- check if record exist  
            if(mysqli_num_rows($response)>0){
                if ($row_location_info = mysqli_fetch_array($response)){                      
                echo'
                <div class="row justify-content-center">
                    <div class="col-md-4 mt-3">
                    <h4 class="text-center mb-4">Location Info</h4>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="loc_id">Location ID</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="loc_id" value="'.$row_location_info['loc_id'].'" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="lat_dd">Latitude (DD)</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="lat_dd" value="'.$row_location_info['lat_dd'].'" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="long_dd">Longitude (DD)</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="long_dd" value="'.$row_location_info['long_dd'].'" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="loc_acc">Location Accuracy (m)</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="loc_acc" value="'.$row_location_info['loc_acc'].'" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="map_unit">Soil Map Unit</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="map_unit" value="'.$row_location_info['map_unit'].'" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="subgroup">Soil Subgroup</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="subgroup" value="'.$row_location_info['subgroup'].'" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="series">Soil Series</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="series" value="'.$row_location_info['series'].'" />
                            </div>
                        </div>
                    </div>
                </div>
                ';  
                }      
            }

            else{
                
                echo"ERROR: No entries found. Please check the value you entered.</br>
                You have entered Location ID: <b>'.$loc_id.'</b>";
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
        <input class="btn btn-danger" type="submit" name="update-location" value="Update Location" />
    </div>
    
</form>
</div> 
</body>   
</html>
