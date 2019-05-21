<head><title>Update Sample</title></head>
<?php include '../nav-template.php';  
      include("../functions/redirect-homepage.php");            
?>

<div class="container">
    <h1 class="display-4 text-center mb-5">Update Sample</h1>
    <hr class="mb-4">
</div>
<div class="container">
<form class="justify content center" action="sample-updated.php" method="post">
<div class="row">
 
    <?php
    require '../db-connect.php';
    if (isset($_POST['update-sample-id'])){
        $sample_id = $_POST['update-sample-id'];
        $query_sample = "SELECT * FROM sample_info WHERE sample_id ='$sample_id'";
        $response = @mysqli_query($dbc, $query_sample);
        if($response){
            //-- check if record exist  
            if(mysqli_num_rows($response)>0){
                $status="";
               
                if ($row_sample_info = mysqli_fetch_array($response)){                      
                echo'
                <!-- Sample Info -->
                <div class="col-md-8">
                <div class="row">
                <div class="col-md-6">
                    <h4 class="text-center mb-4">Sample Info</h4>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="sample_id">Sample ID</label>
                        <div class="col-sm-7">
                            <input class="form-control" required type="text" name="sample_id" value="'.$sample_id.'" readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="loc_id">Location ID</label>
                        <div class="col-sm-7">';   
                        
                            
                            $query_loc_id = "SELECT loc_id FROM location_info";
                            $get_loc_id = @mysqli_query($dbc, $query_loc_id);

                            echo
                                '<select class="form-control" name="loc_id" required>
                                 <option value="'.$row_sample_info["loc_id"].'" hidden>'.$row_sample_info["loc_id"].'</option>';
                            
                            while($row_loc_id = mysqli_fetch_assoc($get_loc_id))
                            {      
                                echo '<option value='.$row_loc_id["loc_id"].'>'.$row_loc_id["loc_id"].'</option>';
                            }
                            echo"</select>";
                    echo'    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="proj_id">Project ID</label>
                        <div class="col-sm-7">';
                            
                            
                            $query_proj_id = "SELECT proj_id FROM projects";
                            $get_proj_id = @mysqli_query($dbc, $query_proj_id);

                            echo
                                '<select class="form-control" name="proj_id" required >
                                <option value="'.$row_sample_info["proj_id"].'">'.$row_sample_info["proj_id"].'</option>';
                            
                            while($row_proj_id = mysqli_fetch_assoc($get_proj_id))
                            {      
                                echo '<option value='.$row_proj_id["proj_id"].'>'.$row_proj_id["proj_id"].'</option>';
                            }
                            echo"</select>";
                        echo '    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="year">Year</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="year" value="'.$row_sample_info["year"].'" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="date">Date</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="date" name="date" value="'.$row_sample_info["date"].'"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="province">Province</label>
                        <div class="col-sm-7">
                            <select class="form-control" required name="province">
                                <option value="'.$row_sample_info["province"].'">'.$row_sample_info["province"].'</option>';
                                $provinces = array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT");
                                foreach($provinces as $prov){
                                echo '<option value="'.$prov.'">'.$prov.'</option>';
                                }
                            echo' 
                            </select>      
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="u_depth">Upper Depth</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="u_depth" value="'.$row_sample_info["u_depth"].'" placeholder="Centimetres" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="l_depth">Lower Depth</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="l_depth" value="'.$row_sample_info["l_depth"].'" placeholder="Centimetres" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="horizon">Horizon</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="horizon" value="'.$row_sample_info["horizon"].'" placeholder=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="orig_id">Original ID</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="orig_id" value="'.$row_sample_info["orig_id"].'" placeholder=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="notes">Notes</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="notes" value="'.$row_sample_info["notes"].'" placeholder=""/>
                        </div>
                    </div>
                </div>';  
                }      
            }

            else{
                $status="disabled";
                echo"ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID: <b>'.$sample_info.'</b>";
                echo mysqli_error($dbc)."</br>";
            }
            //mysqli_close($dbc);       
        }
            else{    
                echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            }   

            //-- Physical Info --
            
        
            $query_physical = "SELECT sample_info.sample_id, physical.* FROM sample_info left JOIN physical ON sample_info.sample_id = physical.sample_id where sample_info.sample_id = '$sample_id' order by sample_info.sample_id";
            $response_physical = @mysqli_query($dbc, $query_physical);
            
            if($response_physical){
                if(mysqli_num_rows($response_physical)>0){ 
                    $status="";
            //-- RECORDS EXIST --    
        
            if ($row_physical = mysqli_fetch_array($response_physical)){
            
            //-- Physical Info  --
            echo'
            <div class="col-md-6">
                <h4 class="text-center mb-4">Physical</h4>
                
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="t_gravel">Total Gravel</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="t_gravel" value="'.$row_physical["t_gravel"].'" placeholder="%"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="t_clay">Total Clay</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="t_clay" value="'.$row_physical["t_clay"].'" placeholder="%"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="t_silt">Total Silt</label>
                    <div class="col-sm-7">
                        <input class="form-control"  type="text" name="t_silt" value="'.$row_physical["t_silt"].'" placeholder="%"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="t_sand">Total Sand</label>
                    <div class="col-sm-7">
                        <input class="form-control"  type="text" name="t_sand" value="'.$row_physical["t_sand"].'" placeholder="%"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="vc_sand">Very Coarse Sand</label>
                    <div class="col-sm-7">
                        <input class="form-control"  type="text" name="vc_sand" value="'.$row_physical["vc_sand"].'" placeholder="%"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="c_sand">Coarse Sand</label>
                    <div class="col-sm-7">
                        <input class="form-control"  type="text" name="c_sand" value="'.$row_physical["c_sand"].'" placeholder="%"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="m_sand">Medium Sand</label>
                    <div class="col-sm-7">
                        <input class="form-control"  type="text" name="m_sand" value="'.$row_physical["m_sand"].'" placeholder="%"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="f_sand">Fine Sand</label>
                    <div class="col-sm-7">
                        <input class="form-control"  type="text" name="f_sand" value="'.$row_physical["f_sand"].'" placeholder="%"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="vf_sand">Very Fine Sand</label>
                    <div class="col-sm-7">
                        <input class="form-control"  type="text" name="vf_sand" value="'.$row_physical["vf_sand"].'" placeholder="%"/>
                    </div>
                </div>
                <div class="form-group row">                    
                    <label class="col-sm-4 col-form-label" for="u_depth_bd">Upper Depth (Bulk Density)</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="u_depth_bd" value="'.$row_physical["u_depth_bd"].'" placeholder="cm"/>
                    </div>
                </div>
                <div class="form-group row">                    
                    <label class="col-sm-4 col-form-label" for="l_depth_bd">Lower Depth (Bulk Density)</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="l_depth_bd" value="'.$row_physical["l_depth_bd"].'" placeholder="cm"/>
                    </div>
                </div>
                <div class="form-group row">                    
                    <label class="col-sm-4 col-form-label" for="bulkd">Bulk Density</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="bulkd" value="'.$row_physical["bulkd"].'" placeholder="g/cm&sup3"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="texture">Texture</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" value="'.$row_physical["texture"].'" name="texture"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="field_txt">Field Texture</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" value="'.$row_physical["field_txt"].'" name="field_txt"/>
                    </div>
                </div>
            </div>
        </div>';
                                                                                        
            }     
            } 
            else {
                $status="disabled";
                echo "ERROR: No entries found. Please check the value you entered.</br>
                      You have entered Sample ID:<b>$sample_id</b></br>";
            }
     
            }
            else {
                 echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            }
            
            
            
                
            $query_archive = "SELECT sample_info.sample_id, archive.* FROM sample_info left JOIN archive ON sample_info.sample_id = archive.sample_id where sample_info.sample_id = '$sample_id' order by sample_info.sample_id";
            $response_archive = @mysqli_query($dbc, $query_archive);
            
            echo'<div class="row">';

            if($response_archive){
                if(mysqli_num_rows($response_archive)>0){ 
                    $status="";
            //-- RECORDS EXIST --    
        
            if ($row_archive = mysqli_fetch_array($response_archive)){
            
            //-- Archive Info
            echo'                         
                <div class="col-md-6 mt-5 px-5">
                    <div class="row justify-content-center mb-5">
                        <h4 class="d-inline mr-2">Archive</h4>
                        <h4 class="d-inline text-muted">(Jar #1)</h4>
                    </div>
                    <div class="form-group row mt-">
                        <label class="col-sm-5 col-form-label" for="jar_1">Jar #</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="jar_1" value="'.$row_archive["jar"].'" readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="arch_year_jar_1">Archive Year</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="arch_year_jar_1"  value="'.$row_archive["arch_year"].'" placeholder="YYYY" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="section_jar_1">Section</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="section_jar_1"  value="'.$row_archive["section"].'"required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="column_jar_1">Column</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="column_jar_1"  value="'.$row_archive["arch_col"].'" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="row_jar_1">Row</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="row_jar_1"  value="'.$row_archive["arch_row"].'" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="box_id_jar_1">Box ID</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="box_id_jar_1"  value="'.$row_archive["box_id"].'" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="weight_jar_1">Weight</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="weight_jar_1"  value="'.$row_archive["weight"].'" placeholder="g"/>
                        </div>
                    </div>
                </div>
                ';
           }     
        } 
        
        else {
                $status="disabled";
                echo "ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID:<b>$sample_id</b></br>";
        }
    }
        else{
            echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            
        }

            $query_archive_jar2 = "SELECT sample_info.sample_id, archive.* FROM sample_info left JOIN archive ON sample_info.sample_id = archive.sample_id WHERE sample_info.sample_id = '$sample_id' AND archive.jar = 2";
            $response_archive_jar2 = @mysqli_query($dbc, $query_archive_jar2);
            
            $row_archive_jar2 = mysqli_fetch_array($response_archive_jar2);
            $rowcount_archive_jar2 = mysqli_num_rows($response_archive_jar2);
            
            
                    //-- Archive Info Jar #2
                    echo'                         
                    <div class="col-md-6 mt-5 px-5">
                    <div class="row justify-content-center">
                        <h4 class="d-inline mr-2">Archive</h4>
                        <h4 class="d-inline text-muted">(Jar #2)</h4>
                    </div>
                    <p class="small text-center mb-4">(If required)</p>
                        <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="jar_2_required">Second Jar?</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="jar_2_required">
                                    <option value="no">No</option>
                                    <option value="yes"'; if($rowcount_archive_jar2 > 0){echo'selected="selected"';} echo'>Yes</option>
                            </select>
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="arch_year_jar_1">Archive Year</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="arch_year_jar_2"  value="'.$row_archive_jar2["arch_year"].'" placeholder="YYYY"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="section_jar_1">Section</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="section_jar_2"  value="'.$row_archive_jar2["section"].'" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="column_jar_1">Column</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="column_jar_2"  value="'.$row_archive_jar2["arch_col"].'" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="row_jar_1">Row</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="row_jar_2"  value="'.$row_archive_jar2["arch_row"].'" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="box_id_jar_1">Box ID</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="box_id_jar_2"  value="'.$row_archive_jar2["box_id"].'" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="weight_jar_2">Weight</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="weight_jar_2"  value="'.$row_archive_jar2["weight"].'" placeholder="g"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                }     
              
        //-- Chemical Info  -->            
    
        $query_chemical = "SELECT sample_info.sample_id, chemical.* FROM sample_info left JOIN chemical ON sample_info.sample_id = chemical.sample_id where sample_info.sample_id = '$sample_id' order by sample_info.sample_id";
        $response_chemical = @mysqli_query($dbc, $query_chemical);
        
        if($response_chemical){
            if(mysqli_num_rows($response_chemical)>0){  
                $status="";
        //-- RECORDS EXIST --    
        
        if ($row_chemical = mysqli_fetch_array($response_chemical)){
 
        echo'
        <div class="col-md-4">
        <h4 class="text-center mb-4">Chemical Info</h4>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ph_cacl2">pH (CaCl<sub>2</sub>)</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["ph_cacl2"].'" name="ph_cacl2"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ph_h2o">pH (H<sub>2</sub>O)</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["ph_h2o"].'" name="ph_h2o"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ttl_c">Total C</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["ttl_c"].'" name="ttl_c" placeholder="%"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ttl_n">Total N</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["ttl_n"].'" name="ttl_n" placeholder="%"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="caco3">CaCO<sub>3</sub></label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["caco3"].'" name="caco3" placeholder="%"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="org_c">org_c</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["org_c"].'" name="org_c"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="org_c_n">org_c_n</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["org_c_n"].'" name="org_c_n"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="tec">Total Exchangable Cations</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["tec"].'" name="tec" placeholder="meq/100g"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="cec">Cation Exchange Capacity</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["cec"].'" name="cec" placeholder="meq/100g"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="al_exch">Exchangable Al</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["al_exch"].'" name="al_exch" placeholder="meq/100g"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ca_exch">Exchangable Ca</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["ca_exch"].'" name="ca_exch" placeholder="meq/100g"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="mg_exch">Exchangable Mg</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["mg_exch"].'" name="mg_exch" placeholder="meq/100g"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="k_exch">Exchangable K</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["k_exch"].'" name="k_exch" placeholder="meq/100g"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="exch_na">Exchangable Na</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["na_exch"].'" name="na_exch" placeholder="meq/100g"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="avail_k">Available K</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["avail_k"].'" name="avail_k" placeholder="&#xb5;g/g"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="avail_pbi">Available P (NaHCO<sub>3</sub>)</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["avail_pbi"].'" name="avail_pbi" placeholder="&#xb5;g/g"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="avail_pbr">Available P (Bray)</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="'.$row_chemical["avail_pbr"].'" name="avail_pbr" placeholder="&#xb5;g/g"/>
            </div>
        </div>
    </div>
</div>';
        }     
         } 
         else {
               $status="disabled";
               echo "ERROR: No entries found. Please check the value you entered.</br>
               You have entered Sample ID:<b>$sample_id</b></br>";
        }
        }
        else {
            echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            
        }
        
    
    mysqli_close($dbc);
        
        
  //--  else{
  //--          redirect_homepage();
  //--  }
?>
    <!-- Submit -->
    <div class="text-center my-5" name="submit"> 
        <input class="btn btn-danger" type="submit" name="update-sample" value="Update Sample" <?php echo $status ?> />
    </div>
    
</form>
</div> 
</body>   
</html>
