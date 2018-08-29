<html>
<?php
    include '../index.php';  
         include("../functions/redirect_homepage.php");            

?>
<head><title>Update Sample</title></head>
<style>
    
    
     p{
        width:500px;
       text-align: left;
     padding-left: 100px;      
    }
    
    input[type = text]{
        height:28pt;
        float: right;
        width: 200px;
    }
  
    input[type = submit]{       
        padding:7px 18px;
      
        background: #a9a033;
        border-radius: 4px;
        border: 2pt solid #a9a633; 
        width: 300px;
       
    }
    
    
    
    
    select{
        height:28pt;
        float: right;
    }
    
    .left{
        width:50%;
        text-align: center;
    }
    
    .right{
        width:50%;
        text-align: center;
}
    
    
</style>   
  
<body>
    
<div id="instruction" class="page-subtitle">
     <p class="big-2"><strong>Update Sample</strong></p>
   
    </div> 
    
<div class="page-main-content">
    <?php 
    include ('../functions/tab.php');
    ?>
    
    <form action = "update3.php" method = "post"> 
<?php
    require '../dbConnect.php';
    if (isset($_POST['idanswer'])){
        $answer=$_POST['idanswer'];
        $query = "SELECT * FROM sample WHERE sample_id ='$answer'";
        $response = @mysqli_query($dbc,$query);
        if($response){
//-------------------check if record exist  
             echo '<div id="tabNum1" class="tabcontent">';
            if(mysqli_num_rows($response)>0){
                $status="";
               
                if ($row = mysqli_fetch_array($response)){                      
                    echo'
                     <input type ="hidden" name="sample_id"  value = "'.$answer.'" />  
                    <div class="fourtyfive left">
                    <p>You have entered Sample ID. <b>'.$answer.'</b>.</p>
    
                    
                    <p>Site Number:'; 
                    $queryAdd_SiteNum= "SELECT site_num FROM site_info";
                    $get_addSiteNum=@mysqli_query($dbc,$queryAdd_SiteNum);

                    echo"<select required name='site_num' style='width:200px;'>";
                    //----echo the current site number
                    echo"<option value=".$row['site_num'].">".$row['site_num']."</option>";
                    //----give options to all site numbers
                    while($row_addSiteNum=mysqli_fetch_assoc($get_addSiteNum)){      
                        echo"<option value=".$row_addSiteNum['site_num'].">".$row_addSiteNum['site_num']."</option>";
                    }
                    echo"</select>";

                    echo '</p>

                    <p>field ID:
                    <input required type ="text" name="field_id" maxlength="4" value = "'.$row['field_id'].'" />
                    </p>

                    <p>Site Type:
                    <input required type ="text" name="site_type" maxlength="4" value = "'.$row['site_type'].'" />
                    </p>

                    <p>Year(YYYY):
                    <input required type="text" name="year" maxlength="4" value="'.$row['year'].'" />
                    </p>

                    <p>Sample Number:
                    <input required type="text" name="sample_num" maxlength="4" value="'.$row['sample_num'].'" />
                    </p>
                    </div>
                    
                    <div class="fourtyfive right">
                    <p>Lab Number:
                    <input required type="text" name="lab_num" maxlength="10" value="'.$row['lab_num'].'" />
                    </p>

                    <p>Zone Number:
                    <input required type="text" name="zone" maxlength="2" value="'.$row['zone'].'" />
                    </p>

                    <p>Shelf Number:
                    <input required type="text" name="shelf" maxlength="2" value="'.$row['shelf'].'" />
                    </p>

                    <p>Level in Shelf:
                    <input required type="text" name="level" maxlength="2" value="'.$row['level'].'" />
                    </p>

                    <p>Row in Level:
                    <input required type="text" name="row"  value="'.$row['row'].'" />
                    </p>

                    <p>Box in the Row:
                    <input required type="text" name="box" maxlength="2" value="'.$row['box'].'" />
                    </p>
                    </div>';  
                }      
            
            
            }else{
                $status="disabled";
                echo"ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID: <b>$answer</b> ";
                echo mysqli_error($dbc)."</br>";
            }
        //mysqli_close($dbc);       
        }else{
    
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        }   
  
      
     echo"</div>";
    echo '<div id="tabNum2" class="tabcontent">
          <div class="fourtyfive">
                <p style="width:100%;">
                    

		The site information is automatically filled with the "site number" chosen under the general info section.<br>

		If your desired site number is not shown on the dropdown menu, please go to "Sample management" ? "Add Site" to add the new site.
                </p>
            </div>
        </div>';

    


     $query2=" SELECT sample.sample_id,physical.* FROM sample left JOIN physical ON sample.sample_id=physical.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
     $response2 = @mysqli_query($dbc,$query2);
      echo '<div id="tabNum3" class="tabcontent">';
     if($response2){
         if(mysqli_num_rows($response2)>0){ 
             $status="";
//-----------------------RECORDS EXIST-------------------------------    
        
            if ($row_QueryPhy = mysqli_fetch_array($response2)){
 
                echo' 
                <input type ="hidden" name="SMPL_ID"  value = "'.$answer.'" />
                <div class="fourtyfive left">
                <p>LAB:
                    <input required type="text" name="LAB" value="'. $row_QueryPhy['LAB'].'" />
                </p>
                <p>Location:
                    <input required type="text" name="LOCATION" value="'. $row_QueryPhy['LOCATION'].'" />
                </p>
                <p>Depth:
                    <input required type="text" name="DEPTH" value="'. $row_QueryPhy['DEPTH'].'" />
                </p>
                <p>Sand:
                    <input required type="text" name="SAND" value="'. $row_QueryPhy['SAND'].'" />
                </p>
                <p>Clay:
                    <input required type="text" name="CLAY" value="'. $row_QueryPhy['CLAY'].'" />
                </p>
                <p>Silt:
                    <input required type="text" name="SILT" value="'. $row_QueryPhy['SILT'].'" />
                </p>
                </div>
                
                
                <div class="fourtyfive right">
                <p>Sand_VC:
                    <input required type="text" name="SAND_VC" value="'. $row_QueryPhy['SAND_VC'].'" />
                </p>
                <p>Sand_C:
                    <input required type="text" name="SAND_C" value="'. $row_QueryPhy['SAND_C'].'" />
                </p>
                <p>Sand_M:
                    <input required type="text" name="SAND_M" value="'. $row_QueryPhy['SAND_M'].'" />
                </p>
                <p>Sand_F:
                    <input required type="text" name="SAND_F" value="'. $row_QueryPhy['SAND_F'].'" />
                </p>
                <p>Sand_VF:
                    <input required type="text" name="SAND_VF" value="'. $row_QueryPhy['SAND_VF'].'" />
                </p>
                </div>';
                                                                                        
            }     
            } else{
                $status="disabled";
                echo "ERROR: No entries found. Please check the value you entered.</br>
                      You have entered Sample ID:<b> $answer</b></br>";
            }
     
     }else{
    
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
    }
    echo'</div>';
        
        
     $query3=" SELECT sample.sample_id,chemical.* FROM sample left JOIN chemical ON sample.sample_id=chemical.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
     $response3 = @mysqli_query($dbc,$query3);
     echo '<div id="tabNum4" class="tabcontent">';
     if($response3){
         if(mysqli_num_rows($response3)>0){ 
             $status="";
//-----------------------RECORDS EXIST-------------------------------    
        
            if ($row_QueryChe = mysqli_fetch_array($response3)){
 
                echo' 
                <div class="fourtyfive left">
                <p>ORG_MTR:
                    <input required type="text" name="ORG_MTR" value="'. $row_QueryChe['ORG_MTR'].'" />
                </p>
                <p>CEC:
                    <input required type="text" name="CEC" value="'. $row_QueryChe['CEC'].'" />
                </p>
                <p>BUFFER_PH:
                    <input required type="text" name="BUFFER_PH" value="'. $row_QueryChe['BUFFER_PH'].'" />
                </p>
                </div>

                <div class="fourtyfive left">
                <p>PER_K:
                    <input required type="text" name="PER_K" value="'. $row_QueryChe['PER_K'].'" />
                </p>
                <p>PER_MG:
                    <input required type="text" name="PER_MG" value="'. $row_QueryChe['PER_MG'].'" />
                </p>
                <p>PER_CA:
                    <input required type="text" name="PER_CA" value="'. $row_QueryChe['PER_CA'].'" />
                </p>
                <p>PER_NA:
                    <input required type="text" name="PER_NA" value="'. $row_QueryChe['PER_NA'].'" />
                </p>
                </div>
                ';
           }     
         
         } else{
                $status="disabled";
                echo "ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID:<b> $answer</b></br>";
         }
     }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';
        
        
     $query4=" SELECT sample.sample_id,biome.* FROM sample left JOIN biome ON sample.sample_id=biome.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
     $response4 = @mysqli_query($dbc,$query4);
      echo '<div id="tabNum5" class="tabcontent">';
     if($response4){
         if(mysqli_num_rows($response4)>0){  
             $status="";
//-----------------------RECORDS EXIST-------------------------------    
        
             if ($row_QueryBio = mysqli_fetch_array($response4)){
 
                echo' 
                    <div class="fourtyfive left">             
                    <p>Biome01:
                        <input required type="text" name="biome01" value="'. $row_QueryBio['biome01'].'" />
                    </p>
                    <p>Biome02:
                        <input required type="text" name="biome02" value="'. $row_QueryBio['biome02'].'" />
                    </p>
                    <p>Biome03:
                        <input required type="text" name="biome03" value="'. $row_QueryBio['biome03'].'" />
                    </p>

                    <p>Biome04:
                        <input required type="text" name="biome04" value="'. $row_QueryBio['biome04'].'" />
                    </p>
                    <p>Biome05:
                        <input required type="text" name="biome05" value="'. $row_QueryBio['biome05'].'" />
                    </p>
                    <p>Biome06:
                        <input required type="text" name="biome06" value="'. $row_QueryBio['biome06'].'" />
                    </p>
                    </div>
                    ';

           }     
         } else{
               $status="disabled";
               echo "ERROR: No entries found. Please check the value you entered.</br>
               You have entered Sample ID:<b> $answer</b></br>";
         }
     }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';
        
        
     $query5=" SELECT sample.sample_id,spectral.* FROM sample left JOIN spectral ON sample.sample_id=spectral.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
     $response5 = @mysqli_query($dbc,$query5);
      echo '<div id="tabNum6" class="tabcontent">';
     if($response5){
         if(mysqli_num_rows($response5)>0){ 
             $status="";
//-----------------------RECORDS EXIST-------------------------------    
        
            if ($row_QuerySpectral = mysqli_fetch_array($response5)){
 
                echo'
                    <div class="fourtyfive left">
                    <p>spectral01:
                        <input required type="text" name="spectral01" value="'. $row_QuerySpectral['spectral01'].'" />
                    </p>
                     <p>spectral02:
                        <input required type="text" name="spectral02" value="'. $row_QuerySpectral['spectral02'].'" />
                    </p>
                     <p>spectral03:
                        <input required type="text" name="spectral03" value="'. $row_QuerySpectral['spectral03'].'" />
                    </p>
                    </div>';                                                                          
                }     
        } else{
            $status="disabled";
            echo "ERROR: No entries found. Please check the value you entered.</br>
            You have entered Sample ID:<b> $answer</b></br>";
        }
     }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';
    mysqli_close($dbc);
           }
        
    else{
            redirect_homepage();

     }
         
?>
     
    <div id="updateNow">    
        <input type = "submit" id="updateButton" name = "updateNow" value = "Update Now" <?php echo $status ?> />  
    </div>
    

     
</form> 
 </div>
    <div id="newUpdate">
        <button onclick="history.go(-1);" >Start a New Updating</button>
    </div>
</body>   
<script>
     document.getElementById("defaultOpen").click();
</script>
   
</html>
