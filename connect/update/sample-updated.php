<head><title>Update Sample</title></head>
   
<?php
    include '../nav-template.php';  
    include("../functions/redirect-homepage.php");
?>


       
<div class="container">
    <div class="row justify-content-center" id="instruction" >
		<div class="col-6 text-center">
            <h1 class="display-4">Sample Updated</h1>
            <p class="lead my-4">Here is the updated sample data.</p>  
        </div> 
    </div>
    <div class="row">
    <hr class="mb-4">   
<?php   
        
        if (isset($_POST['updateNow'])){        
        $site_num=$_POST['site_num'];
        $field_id=$_POST['field_id'];
        $site_type=$_POST['site_type'];
        $year=$_POST['year'];
        $sample_num=$_POST['sample_num'];
        $lab_num=$_POST['lab_num'];
        $zone=$_POST['zone'];
        $shelf=$_POST['shelf'];
        $level=$_POST['level'];
        $rowrow=$_POST['row'];
        $box=$_POST['box'];
        $sample_id=$_POST['sample_id'];
            
        //------physical variables
        $SMPL_ID=$_POST['sample_id'];
        $LAB=$_POST['LAB'];
        $LOCATION=$_POST['LOCATION'];
        $DEPTH=$_POST['DEPTH'];
        $SAND=$_POST['SAND'];
        $CLAY=$_POST['CLAY'];
        $SILT=$_POST['SILT'];
        $SAND_VC=$_POST['SAND_VC'];
        $SAND_C=$_POST['SAND_C'];
        $SAND_M=$_POST['SAND_M'];
        $SAND_F=$_POST['SAND_F'];
        $SAND_VF=$_POST['SAND_VF'];
        //-------------Chemical
        $ORG_MTR=$_POST['ORG_MTR'];
        $CEC=$_POST['CEC'];
        $BUFFER_PH=$_POST['BUFFER_PH'];
        $PER_K=$_POST['PER_K'];
        $PER_MG=$_POST['PER_MG'];
        $PER_CA=$_POST['PER_CA'];
        $PER_NA=$_POST['PER_NA'];  
//------biome info from $_POST[]--------
        $biome01=$_POST['biome01'];
        $biome02=$_POST['biome02'];
        $biome03=$_POST['biome03'];
        $biome04=$_POST['biome04'];
        $biome05=$_POST['biome05'];
        $biome06=$_POST['biome06'];
//------spectral info from $_POST[]--------
        $spectral01=$_POST['spectral01'];
        $spectral02=$_POST['spectral02'];
        $spectral03=$_POST['spectral03'];
       require '../dbConnect.php';


        $queryUpdate="         
        UPDATE sample SET site_num='$site_num',field_id='$field_id',site_type='$site_type',year='$year',sample_num='$sample_num', lab_num='$lab_num',zone='$zone',shelf='$shelf',level='$level',row='$rowrow',box='$box' WHERE sample_id='$sample_id';";      
    
//-----------------Physical Update Query------------
        $queryUpdate .="
        INSERT INTO physical 
        ( SMPL_ID, LAB, LOCATION, DEPTH, SAND, CLAY, SILT, SAND_VC, SAND_C, SAND_M, SAND_F, SAND_VF)VALUES        ('$SMPL_ID','$LAB','$LOCATION','$DEPTH','$SAND','$CLAY','$SILT','$SAND_VC','$SAND_C','$SAND_M','$SAND_F','$SAND_VF')
        ON DUPLICATE KEY UPDATE LAB='$LAB',LOCATION='$LOCATION',DEPTH='$DEPTH',SAND='$SAND',CLAY='$CLAY',SILT='$SILT',SAND_VC='$SAND_VC',SAND_C='$SAND_C',SAND_M='$SAND_M',SAND_F='$SAND_F',SAND_VF='$SAND_VF';";
     
//-----------------Chemical Update Query------------             
        $queryUpdate .="
        INSERT INTO chemical (`SMPL_ID`, `ORG_MTR`, `CEC`, `BUFFER_PH`, `PER_K`, `PER_MG`, `PER_CA`, `PER_NA`) VALUES('$SMPL_ID', '$ORG_MTR', '$CEC', '$BUFFER_PH', '$PER_K', '$PER_MG', '$PER_CA', '$PER_NA')
        ON DUPLICATE KEY UPDATE 
        ORG_MTR='$ORG_MTR', CEC='$CEC', BUFFER_PH='$BUFFER_PH',PER_K='$PER_K',PER_MG='$PER_MG',PER_CA='$PER_CA',PER_NA='$PER_NA';";
           
//-----------------Biome Update Query------------
        $queryUpdate .="
        INSERT INTO biome (`SMPL_ID`, `biome01`, `biome02`, `biome03`, `biome04`, `biome05`, `biome06`) VALUES('$SMPL_ID','$biome01','$biome02','$biome03','$biome04','$biome05','$biome06') 
        ON DUPLICATE KEY UPDATE 
        biome01='$biome01', biome02='$biome02', biome03='$biome03', biome04='$biome04', biome05='$biome05', biome06='$biome06';";
           
//-----------------Spectral Update Query------------
        $queryUpdate .="
        INSERT INTO spectral (`SMPL_ID`, `spectral01`, `spectral02`, `spectral03`) 
        VALUES ('$SMPL_ID','$spectral01','$spectral02','$spectral03')
        ON DUPLICATE KEY UPDATE 
        spectral01='$spectral01',spectral02='$spectral02',spectral03='$spectral03'
        ;";
            
        $queryUpdate .= "SELECT * FROM sample,physical,chemical,biome,spectral WHERE sample.sample_id ='$sample_id' 
        and sample.sample_id=physical.SMPL_ID and 
        sample.sample_id=chemical.SMPL_ID and 
        sample.sample_id=biome.SMPL_ID and 
        sample.sample_id=spectral.SMPL_ID ";
            
     
       $responseUpdate = @mysqli_multi_query($dbc,$queryUpdate);
        
        if($responseUpdate){ 
        do{
                if ($result=mysqli_store_result($dbc)){
                        while($row = mysqli_fetch_row($result)){    
////////--------------------print out the informations about the new updated sample ------------///////     
                            include("../functions/output-sample-data.php");
                        }  
                   
                        mysqli_free_result($result);
                }
           
            }
            while(mysqli_next_result($dbc));
        }
      
      else{
        echo "RESPONSE SHOW UPDATE FAIL</br>
        ERROR: Could not issue database query</br>";
        echo mysqli_error($dbc)."</br>";
        }            mysqli_close($dbc);  
        }
        else{
                     redirect_homepage();

     }
?>  
        
	<div class="row justify-content-center">
		<div class="col-6 text-center">    
			<a href="update-sample.php"><button class="btn btn-primary">Back</button></a>
		</div>
    </div>
</div>
</body>
</html>