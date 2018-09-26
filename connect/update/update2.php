<head><title>Update Sample</title></head>
<?php include '../index.php';  
      include("../functions/redirect_homepage.php");            
?>

<div class="container">
    <h1 class="display-4 text-center mb-5">Update Sample</h1>
    <hr class="mb-4">
    <div class="justify-content-center">
    <form action="update3.php" method="post"> 
    <?php
    require '../dbConnect.php';
    if (isset($_POST['idanswer'])){
        $answer=$_POST['idanswer'];
        $query = "SELECT * FROM sample WHERE sample_id ='$answer'";
        $response = @mysqli_query($dbc,$query);
        if($response){
            //-- check if record exist  
            echo '<div class="row">';
            if(mysqli_num_rows($response)>0){
                $status="";
               
                if ($row = mysqli_fetch_array($response)){                      
                echo'
                <div class="col-sm-4 px-5">
                    <h4 class="text-center mb-4">Sample Info</h4>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="sample_id">Sample ID</label>
                        <div class="col-sm-7">
                            <input class="form-control" required type="text" name="sample_id" value= "'.$answer.'" readonly/>
                        </div>
                    </div>';
                    
                echo'
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="site_num">Site Number</label>
                        <div class="col-sm-7">';
                
                    $queryAdd_SiteNum= "SELECT site_num FROM site_info";
                    $get_addSiteNum=@mysqli_query($dbc,$queryAdd_SiteNum);

                    echo'<select class="form-control" required name="site_num">';
                    //----echo the current site number
                    echo"<option value=".$row['site_num']." hidden>".$row['site_num']."</option>";
                    //----give options to all site numbers
                    while($row_addSiteNum=mysqli_fetch_assoc($get_addSiteNum)){      
                        echo"<option value=".$row_addSiteNum['site_num'].">".$row_addSiteNum['site_num']."</option>";
                    }
                    echo"</select></div></div>";

                    echo '
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="field_id">Field ID</label>
                        <div class="col-sm-7">    
                            <input class= "form-control" type="text" name="field_id" value="'.$row['field_id'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="site_type">Site Type</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="site_type" value="'.$row['site_type'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="year">Year</label>
                        <div class="col-sm-7">
                            <select class="form-control" required name="year">
                                <option value="'.$row['year'].'" placeholder="" hidden>'.$row['year'].'</option>';
                                for ($i=2000;$i>=1980;$i--)
                                {
                                echo'<option value="'.$i.'">'.$i.'</option>';
                                }
                    echo'
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="sample_num">Sample Number</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="sample_num" value="'.$row['sample_num'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="lab_num">Lab Number</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="lab_num" value="'.$row['lab_num'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="zone">Zone Number</label>
                        <div class="col-sm-7">
                            <input class="form-control" required type="text" name="zone" value="'.$row['zone'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="shelf">Shelf Number</label>
                        <div class="col-sm-7">
                            <input class="form-control" required type="text" name="shelf" value="'.$row['shelf'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="level">level</label>
                        <div class="col-sm-7">
                            <input class="form-control" required type="text" name="level" value="'.$row['level'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="row">Row</label>
                        <div class="col-sm-7">
                            <input class="form-control" required type="text" name="row" value="'.$row['row'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="box">Box</label>
                        <div class="col-sm-7">
                            <input class="form-control" required type="text" name="box" value="'.$row['box'].'" />
                        </div>
                    </div>
                </div>';  
                }      
            }

            else{
                $status="disabled";
                echo"ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID: <b>$answer</b> ";
                echo mysqli_error($dbc)."</br>";
            }
            //mysqli_close($dbc);       
        }
            else{    
                echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            }   

            //-- Physical Info --
            
        
            $query2=" SELECT sample.sample_id,physical.* FROM sample left JOIN physical ON sample.sample_id=physical.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
            $response2 = @mysqli_query($dbc,$query2);
            
            if($response2){
                if(mysqli_num_rows($response2)>0){ 
                    $status="";
            //-- RECORDS EXIST --    
        
            if ($row_QueryPhy = mysqli_fetch_array($response2)){
 
            echo' 
                

                <div class="col-sm-4 px-5">
                    <h4 class="text-center mb-4">Physical Info</h4>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="LAB">Lab</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['LAB'].'" name="LAB"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="LOCATION">Location</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['LOCATION'].'" name="LOCATION"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="LOCATION">Depth</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['DEPTH'].'" name="DEPTH"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="SAND">Depth</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['SAND'].'" name="SAND"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="CLAY">Clay</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['CLAY'].'" name="CLAY"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="SILT">Silt</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['SILT'].'" name="SILT"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="SAND_VC">SAND_VC</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['SAND_VC'].'" name="SAND_VC"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="SAND_C">SAND_C</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['SAND_C'].'" name="SAND_C"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="SAND_M">SAND_M</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['SAND_M'].'" name="SAND_M"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="SAND_F">SAND_F</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['SAND_F'].'" name="SAND_F"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="SAND_VF">SAND_VF</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="'.$row_QueryPhy['SAND_VF'].'" name="SAND_VF"/>
                        </div>
                    </div>
                </div>';
                                                                                        
            }     
            } 
            else {
                $status="disabled";
                echo "ERROR: No entries found. Please check the value you entered.</br>
                      You have entered Sample ID:<b> $answer</b></br>";
            }
     
            }
            else {
                 echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            }
            
            
            
                
            $query3=" SELECT sample.sample_id,chemical.* FROM sample left JOIN chemical ON sample.sample_id=chemical.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
            $response3 = @mysqli_query($dbc,$query3);
            
            if($response3){
                if(mysqli_num_rows($response3)>0){ 
                    $status="";
            //-- RECORDS EXIST --    
        
            if ($row_QueryChe = mysqli_fetch_array($response3)){
 
            echo'
                <div class="col-sm-4 px-5">
                <h4 class="text-center mb-4">Chemical Info</h4>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="ORG_MTR">ORG_MTR</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="ORG_MTR" value="'.$row_QueryChe['ORG_MTR'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="CEC">CEC</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="CEC" value="'.$row_QueryChe['CEC'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="BUFFER_PH">BUFFER_PH</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="BUFFER_PH" value="'.$row_QueryChe['BUFFER_PH'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="PER_K">PER_K</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="PER_K" value="'.$row_QueryChe['PER_K'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="PER_MG">PER_MG</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="PER_MG" value="'.$row_QueryChe['PER_MG'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="PER_CA">PER_CA</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="PER_CA" value="'.$row_QueryChe['PER_CA'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="PER_NA">PER_NA</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="PER_NA" value="'.$row_QueryChe['PER_NA'].'" />
                        </div>
                    </div>
                </div>
            </div>';
           }     
        } 
        
        else {
                $status="disabled";
                echo "ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID:<b> $answer</b></br>";
        }
    }
        else{
            echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            
        }
      
        $query4=" SELECT sample.sample_id,biome.* FROM sample left JOIN biome ON sample.sample_id=biome.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
        $response4 = @mysqli_query($dbc,$query4);
        
        if($response4){
            if(mysqli_num_rows($response4)>0){  
                $status="";
        //-- RECORDS EXIST --    
        
        if ($row_QueryBio = mysqli_fetch_array($response4)){
 
        echo'
            <div class="row">
            <!-- Soil Bio -->
                <div class="col-sm-4 mt-5 px-5">
                <h4 class="text-center mb-4">Biology Info</h4>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="biome01">Soil-Bio 01</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="biome01" value="'.$row_QueryBio['biome01'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="biome02">Soil-Bio 02</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="biome02" value="'.$row_QueryBio['biome02'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="biome03">Soil-Bio 03</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="biome03" value="'.$row_QueryBio['biome03'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="biome03">Soil-Bio 04</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="biome04" value="'.$row_QueryBio['biome04'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="biome03">Soil-Bio 05</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="biome05" value="'.$row_QueryBio['biome05'].'" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="biome04">Soil-Bio 06</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="biome06" value="'.$row_QueryBio['biome06'].'" />
                        </div>
                    </div>
                </div>';
        }     
         } 
         else {
               $status="disabled";
               echo "ERROR: No entries found. Please check the value you entered.</br>
               You have entered Sample ID:<b> $answer</b></br>";
        }
        }
        else {
            echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            
        }
        
        
        
        $query5=" SELECT sample.sample_id,spectral.* FROM sample left JOIN spectral ON sample.sample_id=spectral.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
        $response5 = @mysqli_query($dbc,$query5);
        
        if($response5){
            if(mysqli_num_rows($response5)>0){ 
                $status="";
        //-- RECORDS EXIST ---    
        
        if ($row_QuerySpectral = mysqli_fetch_array($response5)){
 
            echo'
                <div class="col-sm-4 mt-5 px-5">
                    <h4 class="text-center mb-4">Spectral Info</h4>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="spectral01">Spectral 01</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="spectral01" value="'.$row_QuerySpectral['spectral01'].'"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="spectral02">Spectral 02</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="spectral02" value="'.$row_QuerySpectral['spectral02'].'"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="spectral03">Spectral 03</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="spectral03" value="'.$row_QuerySpectral['spectral03'].'"/>
                        </div>
                    </div>
                </div>
            </div>
            ';                                                                          
            }     
        } 
            else{
                $status="disabled";
                echo "ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID:<b> $answer</b></br>";
            }
        }
            else{
                echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            }
    
    mysqli_close($dbc);
           }
        
    else{
            redirect_homepage();
    }
?>
    <div class="row justify-content-center"> 
        <div class="text-center mt-3 mb-5" name="submit">    
            <input class="btn btn-danger" type="submit" id="updateButton" name="updateNow" value="Update Sample" <?php echo $status ?> />
            <button class="btn btn-primary ml-3" onclick="history.go(-1);">Search Again</button>
        </div>
    </div>
</form> 
</body>   
</html>
