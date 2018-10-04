<head><title>Site Added</title></head>
<?php
    include '../nav-template.php'; 
    include("../functions/redirect-homepage.php");
?>

<?php
    if(isset($_POST['submitAdd'])){
        $data_missing=array();
        $site_num =trim($_POST['site_num']);  
        $site_prov = trim($_POST['site_prov']);        
        $site_name = trim($_POST['site_name']);           
        $lat_d = trim($_POST['lat_d']);
        $lat_m = trim($_POST['lat_m']);
        $lat_s = trim($_POST['lat_s']);
        $lon_d = trim($_POST['lon_d']);
        $lon_m = trim($_POST['lon_m']);
        $lon_s = trim($_POST['lon_s']);   
        $size_ha = $_POST['size_ha'];
        $year_establish = $_POST['year_established'];         
        $ecol_setting = $_POST['ecol_setting'];
       
        require_once('../dbConnect.php');
    
       
        $querySiteInsert="INSERT INTO `site_info` (`site_num`,`site_prov`, `site_name`, `lat_d`,`lat_m`,`lat_s`,      `lon_d`,`lon_m`,`lon_s`,`size_ha`, `year_establish`,  `ecol_setting`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = mysqli_prepare($dbc, $querySiteInsert);
        mysqli_stmt_bind_param($stmt,"sssiiiiiisis",$site_num,$site_prov,$site_name,$lat_d,$lat_m,$lat_s,$lon_d,$lon_m,$lon_s,$size_ha,$year_establish,$ecol_setting);
        mysqli_stmt_execute($stmt);
        $affected_rows=mysqli_stmt_affected_rows($stmt);        
        
        if($affected_rows==1){

            echo 
            '<div class="container">
                <div class="row justify-content-center">
                    <p class="lead mb-4">Here is the new site data.</p>
                </div>
            </div>
            ';

            echo'
            <div class="row justify-content-center">
            <div class="col-md-2">
                <p><strong>Site Info</strong></p>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Site Number</th>
                            <td>'.$site_num.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Province</th>
                            <td>'.$site_prov.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Site Name</th>
                            <td>'.$site_name.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Latitude Degrees</th>
                            <td>'.$lat_d.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Latitude Minutes</th>
                            <td>'.$lat_m.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Latitude Seconds</th>
                            <td>'.$lat_s.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Longitude Degrees</th>
                            <td>'.$lon_d.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Longitude Minutes</th>
                            <td>'.$lon_m.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Longitude Seconds</th>
                            <td>'.$lon_s.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Site area (ha)</th>
                            <td>'.$size_ha.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Year</th>
                            <td>'.$year_establish.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Ecological Setting</th>
                            <td>'.$ecol_setting.'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="row justify-content-center mt-4">
                <a href="../index.php"><button class="btn btn-primary">Back</button></a>
            </div>
            </div>
            ';
          
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        
        
        }
        else{
            
            echo'
            <div class="row justify-content-center">
                <p><strong>Error Occurred! Site Number '.$site_num.' already exists. Please check Site Number.</strong><p>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-2 mt-4">
                <p><strong>Site Info</strong></p>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Site Number</th>
                            <td>'.$site_num.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Province</th>
                            <td>'.$site_prov.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Site Name</th>
                            <td>'.$site_name.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Latitude Degrees</th>
                            <td>'.$lat_d.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Latitude Minutes</th>
                            <td>'.$lat_m.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Latitude Seconds</th>
                            <td>'.$lat_s.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Longitude Degrees</th>
                            <td>'.$lon_d.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Longitude Minutes</th>
                            <td>'.$lon_m.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Longitude Seconds</th>
                            <td>'.$lon_s.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Site area (ha)</th>
                            <td>'.$size_ha.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Year</th>
                            <td>'.$year_establish.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Ecological Setting</th>
                            <td>'.$ecol_setting.'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="row justify-content-center mt-4">
                <a href="../index.php"><button class="btn btn-primary">Back</button></a>
            </div>
            </div>
            ';
            
            
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