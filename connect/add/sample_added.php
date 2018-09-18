<html>
<?php
include '../index.php'; 
        include("../functions/redirect_homepage.php");

?>
 <head>
     <title>Soil Sample Added</title>
    

</head>   

<body>
    <div class="page-subtitle">
        <p class="big-2" style="width:100%;"><strong>Added Sample Result</strong></p>
    </div>
    <div class="page-main-content">    
    <div class="with-label-clms Info" id = "phpQuery">
<?php
    if(isset($_POST['submitAdd'])){
//------basic info from $_POST[] --------
        $sample_id=$_POST['sample_id'];
        $site_num = trim($_POST['site_num']);        
        $field_id = trim($_POST['field_id']);    
        $site_type = trim($_POST['site_type']);
        $year = $_POST['year'];
        $sample_num = trim($_POST['sample_num']);
        $lab_num=$_POST['lab_num'];
        $zone = $_POST['zone'];
        $shelf = $_POST['shelf'];
        $level = trim($_POST['level']);
        $rowrow = $_POST['row'];
        $box = $_POST['box'];
//------physical info from $_POST[] --------
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
//------chemical info from $_POST[]--------
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
            
        require_once('../dbConnect.php'); 
        $queryKey = "SELECT * FROM sample WHERE sample_id = '$sample_id'";
        $responseKey = @mysqli_query($dbc,$queryKey);
        if($responseKey){
            if(mysqli_num_rows($responseKey)>0){  
                echo "Error! Record with Sample ID.<b>".$sample_id."</b> already exist!";
                mysqli_close($dbc);   
           }else{
//-------the input SAMPLE ID is not an existing record, good to enter BASIC INFO
                $queryInsertBasic="INSERT INTO `sample` (`sample_id`,`site_num`, `field_id`, `site_type`, `year`, `sample_num`, `lab_num`, `zone`, `shelf`, `level`, `row`, `box` ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmtInsertBasic = mysqli_prepare($dbc, $queryInsertBasic);                   
                
                mysqli_stmt_bind_param($stmtInsertBasic,"ssssissiiiii",
                                       $sample_id,$site_num,$field_id,$site_type,$year,$sample_num, $lab_num,$zone,$shelf,$level,$rowrow,$box);
                
                mysqli_stmt_execute($stmtInsertBasic);
                $affected_rows_Base=mysqli_stmt_affected_rows($stmtInsertBasic);                
               if($affected_rows_Base==1){                  
 //add PHYSICAL info-------------------------------------------------------------------------------             
                    $queryInsertPhy="INSERT INTO physical (`LAB`,`SMPL_ID`, `LOCATION`, `DEPTH`, `SAND`, `CLAY`, `SILT`, `SAND_VC`, `SAND_C`, `SAND_M`, `SAND_F`, `SAND_VF` ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                    $stmtInsertPhy = mysqli_prepare($dbc, $queryInsertPhy);                     
                    
                    mysqli_stmt_bind_param($stmtInsertPhy,"ssssssssssss",
                                           $LAB,$SMPL_ID,$LOCATION,$DEPTH,$SAND,$CLAY, $SILT,$SAND_VC,$SAND_C,$SAND_M,$SAND_F,$SAND_VF);
                    mysqli_stmt_execute($stmtInsertPhy);
                    $affected_rows_Phy=mysqli_stmt_affected_rows($stmtInsertPhy);  
                    if($affected_rows_Phy==1){
                        
 //add CHEMICAL info-----------------------------------------------------------                      
                        $queryInsertChe="INSERT INTO chemical (`SMPL_ID`, `ORG_MTR`, `CEC`, `BUFFER_PH`, `PER_K`, `PER_MG`, `PER_CA`, `PER_NA`) VALUES (?,?,?,?,?,?,?,?)";
                    
                        $stmtInsertChe = mysqli_prepare($dbc, $queryInsertChe); 
                    
                        mysqli_stmt_bind_param($stmtInsertChe,"ssssssss",
                                               $SMPL_ID,$ORG_MTR,$CEC,$BUFFER_PH,$PER_K,$PER_MG,$PER_CA,$PER_NA);   
                        mysqli_stmt_execute($stmtInsertChe);
                        $affected_rows_Che=mysqli_stmt_affected_rows($stmtInsertChe);  
                        if($affected_rows_Che==1){
                            
//add BIOME info-----------------------------------------------------------                                         
                            $queryInsertBio="INSERT INTO biome (`SMPL_ID`, `biome01`, `biome02`, `biome03`, `biome04`, `biome05`, `biome06`) VALUES (?,?,?,?,?,?,?)";
                    
                            $stmtInsertBio = mysqli_prepare($dbc, $queryInsertBio); 
                    
                            mysqli_stmt_bind_param($stmtInsertBio,"sssssss",
                                                   $SMPL_ID,$biome01,$biome02,$biome03,$biome04,$biome05,$biome06);
                            mysqli_stmt_execute($stmtInsertBio);
                            $affected_rows_Bio=mysqli_stmt_affected_rows($stmtInsertBio);  
                            if($affected_rows_Bio==1){
//add SPECTRAL info-----------------------------------------------------------                      
                        
                                $queryInsertSpectral="INSERT INTO spectral (`SMPL_ID`, `spectral01`, `spectral02`, `spectral03`) VALUES (?,?,?,?)";
                                $stmtInsertSpectral = mysqli_prepare($dbc, $queryInsertSpectral);  
                                
                                mysqli_stmt_bind_param($stmtInsertSpectral,"ssss",
                                                       $SMPL_ID,$spectral01,$spectral02,$spectral03);
                                mysqli_stmt_execute($stmtInsertSpectral);
                                $affected_rows_Spectral=mysqli_stmt_affected_rows($stmtInsertSpectral);  
                                if($affected_rows_Spectral==1){

                                    include("../functions/individual_sample_info_columns.php");             
                                    mysqli_stmt_close($stmtInsertBasic);
                                    mysqli_stmt_close($stmtInsertPhy);
                                    mysqli_stmt_close($stmtInsertChe);
                                    mysqli_stmt_close($stmtInsertBio);        
                                    mysqli_stmt_close($stmtInsertSpectral);
                                    mysqli_close($dbc);
                              }else{
                                    echo "error Occors. No records has been entered in SPECTRAL table.</br>
                                        However, you can manage this record in Add & update > Update a sample.</br>";
                                    echo mysqli_error();
                                    mysqli_stmt_close($stmtInsertSpectral);
                                    mysqli_close($dbc);
                                }
//Spectral info end-------------------------------------------------------------------------------/                
                            }else{
                                echo "error Occors. No records has been entered in BIOME table.
                                However, you can manage this record in Add & update > Update a sample.</br></br>";
                                echo mysqli_error();
                                mysqli_stmt_close($stmtInsertBio);
                                mysqli_close($dbc);
                            }
//Biome info end-------------------------------------------------------------------------------/                       
                        

                        }else{
                            echo "error Occors. No records has been entered in CHEMICAL table.</br>
                            However, you can manage this record in Add & update > Update a sample.</br>";
                            echo mysqli_error();
                            mysqli_stmt_close($stmtInsertChe);
                            mysqli_close($dbc);
                        }
//Chemical info end-------------------------------------------------------------------------------/                        
                    
                    }else{
                        echo "error Occors. No records has been entered in PHYSICAL table.</br>
                        However, you can manage this record in Add & update > Update a sample.</br>";
                        echo mysqli_error();
                        mysqli_stmt_close($stmtInsertPhy);
                        mysqli_close($dbc);
                    }
                  
 //Physical info end-------------------------------------------------------------------------------//     
               }else{
                echo "error Occors. No records has been entered in Basic Info table.</br>
                However, you can manage this record in Add & update > Update a sample.</br>";
                echo mysqli_error();
                mysqli_stmt_close($stmtInsertBasic);
                mysqli_close($dbc);
            }
        }   
    }
    }
        else{
            redirect_homepage();
        }
?>
    <button onclick="history.go(-1);" class="float-left submit-button">Add another Sample</button>
    </div> 
        
    
   
        

    
    
         <?php
        
include("../functions/label.php");
?>
    </div>
    
</body>

</html>