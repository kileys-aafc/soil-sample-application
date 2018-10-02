<head><title>Site Added</title></head>
<html>
    <?php
     include '../nav-template.php'; 
    include("../functions/redirect_homepage.php");
    ?>
   

<body>
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
        $year_establish = $_POST['year_establish'];         
        $ecol_setting = $_POST['ecol_setting'];
       
        require_once('../dbConnect.php');
    
       
        $querySiteInsert="INSERT INTO `site_info` (`site_num`,`site_prov`, `site_name`, `lat_d`,`lat_m`,`lat_s`,      `lon_d`,`lon_m`,`lon_s`,`size_ha`, `year_establish`,  `ecol_setting`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = mysqli_prepare($dbc, $querySiteInsert);
        mysqli_stmt_bind_param($stmt,"sssiiiiiisis",$site_num,$site_prov,$site_name,$lat_d,$lat_m,$lat_s,$lon_d,$lon_m,$lon_s,$size_ha,$year_establish,$ecol_setting);
        mysqli_stmt_execute($stmt);
        $affected_rows=mysqli_stmt_affected_rows($stmt);        
        
        if($affected_rows==1){
            echo "New Site Entered: </br>";
            echo"Site Number: ".$site_num."</br>
            Site in Province: ".$site_prov."</br>
            Site Name: ".$site_name."</br>
            Site Coordinate</br>
            Latitude[N]: ".$lat_d."D".$lat_m."M".$lat_s."S</br>
            Longitude[W]: ".$lon_d."D".$lon_m."M".$lon_s."S</br>
            Site Site (in ha): ".$size_ha."</br>
            Year: ".$year_establish."</br>
            
            Ecological Setting: ".$ecol_setting."</br>";
            
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        
        
        }else{
            echo "New Site Entered: </br>";
            echo"Site Number: ".$site_num."</br>
            Site in Province: ".$site_prov."</br>
            Site Name: ".$site_name."</br>
            Site Coordinate</br>
            Latitude[N]: ".$lat_d."D".$lat_m."M".$lat_s."S</br>
            Longitude[W]: ".$lon_d."D".$lon_m."M".$lon_s."S</br>
            Site Site (in ha): ".$size_ha."</br>
            Year: ".$year_establish."</br>
            
            Ecological Setting: ".$ecol_setting."</br>";
            echo "<p><strong>Error Occors!</br>
            Site Number ".$site_num." already exist. Please check number.</br></strong><p>";
            //echo mysqli_error();
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