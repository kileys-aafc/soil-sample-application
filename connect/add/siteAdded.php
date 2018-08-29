<html>
    <?php
     include '../index.php'; 
    include("../functions/redirect_homepage.php");
    ?>
 <head><title>Soil Site Added</title></head>   

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
<!---------------------------------active this section if need to enter site record faster.
<div id = "addstu">
<form action="http://localhost/soil/connect/add/siteAdded.php"    method="post">
<b>Add a New Site</b>
    
    <p>Site Number:
    <input required type ="text" name="site_num" maxlength="2" width=150px value = "" />
    </p>
    
    <p>Site Province:
    <input required type ="text" name="site_prov" maxlength="2" width=150px value = "" />
    </p>
    
   
    <p>Site Name:
    <input required type ="text" name="site_name" maxlength="50" width=150px value = "" />
    </p>
    
    <div id="siteCoor">
    <p>Site Latitude [N]
    <input  type ="text" name="lat_d" maxlength="2" width=80px value = "" placeholder="degree" />   
        <input  type ="text" name="lat_m" maxlength="2" width=80px value = "" placeholder="minute"/>
        <input  type ="text" name="lat_s" maxlength="2" width=80px value = "" placeholder="second" />

    </p>
    
     <p>Site Longitude [W]
     <input  type ="text" name="lon_d" maxlength="3" width=80px value = "" placeholder="degree" />   
    <input  type ="text" name="lon_m" maxlength="2" width=80px value = "" placeholder="minute"/>
    <input  type ="text" name="lon_s" maxlength="2" width=80px value = "" placeholder="second" />
    </p>
    </div>
    <p>Site Size (in ha):
    <input required type ="text" name="size_ha" maxlength="50" width=150px value = "" />
    </p>
    
    <p>Year Established(YYYY):
   <select required name="year_establish" width=150px>
            <option value="">-Please Select-</option>
        <?php
            
        for ($i=2000;$i>=1980;$i--){
            ?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
        }
        ?>
            </select>
    </p>

    <p>Ecological Setting:
   <input required type ="text" name="ecol_setting" maxlength="50" width=150px value = "" />
    </p>

    

    <p>
        <input id = "submint" type = "submit" name = "submitAdd" value = "Send"/>
    </p>
    
</form>
        
        
</div>
--->
</body>
<style>
    body{
        font-family: Arial;
    }
    
    #addstu{
        font-size: 13pt;
        padding-top: 15px;
        padding-left: 50px;
        line-height: 2.5;
    }
    b{
        font-size: 13pt;
        padding-bottom: 5px;
    }
    
    p{
        width: 400px;
        text-align: right;
       
    }
    
    input[type = text]{
        height:28pt;
        width: 250px;
    }
    
    input[type = submit]{
        padding:7px 18px;
         float: right;
    }
    select{
        height:28pt;
        float: right;
    }
    #siteCoor input[type = text]{
        height:28pt;
        
        width: 80px;
    }
</style>
</html>