<head><title>Soil Sample Added</title></head>
<?php include '../nav-template.php'; ?>

<main role="main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h1 class="display-4">New Sample</h1>
            <p class="lead my-4">Here is the sample data that was added.</p>  
        </div> 
    </div>
    <div class="row">
        <hr class="mb-4">
    </div>
</div>    
        <?php
            if(isset($_POST['add-sample'])){
                //------Sample info from $_POST[] --------
                $sample_id = $_POST['sample_id'];
                $loc_id = $_POST['loc_id'];        
                $proj_id = $_POST['proj_id'];    
                $year = $_POST['year'];
                if($_POST['date'] == ""){$date = NULL;}else{$date = $_POST['date'];}
                $province = $_POST['province'];
                $u_depth = $_POST['u_depth'];
                $l_depth = $_POST['l_depth'];
                $horizon = trim($_POST['horizon']);
                $orig_id = $_POST['orig_id'];
                $notes = $_POST['notes'];
                //------Physical info from $_POST[] --------
                if($_POST['bulkd'] == ""){$bulkd = NULL;}else{$bulkd = $_POST['bulkd'];}      
                if($_POST['t_gravel'] == ""){$t_gravel = NULL;}else{$t_gravel = $_POST['t_gravel'];}
                if($_POST['t_clay'] == ""){$t_clay = NULL;}else{$t_clay = $_POST['t_clay'];}
                if($_POST['t_silt'] == ""){$t_silt = NULL;}else{$t_silt = $_POST['t_silt'];}
                if($_POST['t_sand'] == ""){$t_sand = NULL;}else{$t_sand = $_POST['t_sand'];}
				if($_POST['vc_sand'] == ""){$vc_sand = NULL;}else{$vc_sand = $_POST['vc_sand'];}
				if($_POST['c_sand'] == ""){$c_sand = NULL;}else{$c_sand = $_POST['c_sand'];}
				if($_POST['m_sand'] == ""){$m_sand = NULL;}else{$m_sand = $_POST['m_sand'];}
				if($_POST['f_sand'] == ""){$f_sand = NULL;}else{$f_sand = $_POST['f_sand'];}
				if($_POST['vf_sand'] == ""){$vf_sand = NULL;}else{$vf_sand = $_POST['vf_sand'];}
				if($_POST['texture'] == ""){$texture = NULL;}else{$texture = $_POST['texture'];}
				if($_POST['field_txt'] == ""){$field_txt = NULL;}else{$field_txt = $_POST['field_txt'];}
                //------Chemical info from $_POST[]--------
                if($_POST['ph_cacl2'] == ""){$ph_cacl2 = NULL;}else{$ph_cacl2 = $_POST['ph_cacl2'];}
				if($_POST['ph_h2o'] == ""){$ph_h2o = NULL;}else{$ph_h2o = $_POST['ph_h2o'];}
				if($_POST['ttl_c'] == ""){$ttl_c = NULL;}else{$ttl_c = $_POST['ttl_c'];}
				if($_POST['ttl_n'] == ""){$ttl_n = NULL;}else{$ttl_n = $_POST['ttl_n'];}
				if($_POST['caco3'] == ""){$caco3 = NULL;}else{$caco3 = $_POST['caco3'];}
				if($_POST['org_c'] == ""){$org_c = NULL;}else{$org_c = $_POST['org_c'];}
				if($_POST['org_c_n'] == ""){$org_c_n = NULL;}else{$org_c_n = $_POST['org_c_n'];}
				if($_POST['tec'] == ""){$tec = NULL;}else{$tec = $_POST['tec'];}
				if($_POST['cec'] == ""){$cec = NULL;}else{$cec = $_POST['cec'];}
				if($_POST['ca_exch'] == ""){$ca_exch = NULL;}else{$ca_exch = $_POST['ca_exch'];} 
				if($_POST['mg_exch'] == ""){$mg_exch = NULL;}else{$mg_exch = $_POST['mg_exch'];}
				if($_POST['k_exch'] == ""){$k_exch = NULL;}else{$k_exch = $_POST['k_exch'];}
				if($_POST['na_exch'] == ""){$na_exch = NULL;}else{$na_exch = $_POST['na_exch'];}
				if($_POST['avail_pbi'] == ""){$avail_pbi = NULL;}else{$avail_pbi = $_POST['avail_pbi'];}   
				if($_POST['avail_pbr'] == ""){$avail_pbr = NULL;}else{$avail_pbr = $_POST['avail_pbr'];}
                //------Archive Jar #1 info from $_POST[]--------
                $jar_1 = $_POST['jar_1'];
                $arch_year_jar_1 = $_POST['arch_year_jar_1'];
                $section_jar_1 = strtoupper($_POST['section_jar_1']);
                $column_jar_1 = strtoupper($_POST['column_jar_1']);
                $row_jar_1 = $_POST['row_jar_1'];
                $box_id_jar_1 = $_POST['box_id_jar_1'];
                //------Archive Jar #2 info from $_POST[]--------
                $jar_2 = 2;
                $jar_2_required = $_POST['jar_2_required'];
                $arch_year_jar_2 = $_POST['arch_year_jar_2'];
                $section_jar_2 = strtoupper($_POST['section_jar_2']);
                $column_jar_2 = strtoupper($_POST['column_jar_2']);
                $row_jar_2 = $_POST['row_jar_2'];
                $box_id_jar_2 = $_POST['box_id_jar_2'];
                        
                require_once('../db-connect.php'); 
                $query_sample_id = "SELECT * FROM sample_info WHERE sample_id = '$sample_id'";
                $response_sample_id = @mysqli_query($dbc, $query_sample_id);
                if($response_sample_id){
                    if(mysqli_num_rows($response_sample_id) > 0){  
                        echo '  <div class="row justify-content-center">
                                    <div class="col-6 text-center">
                                        <p>Error! Sample ID <strong>'.$sample_id.'</strong> already exists!</p>    
                                    </div>
                                </div>';
                        mysqli_close($dbc);   
                    }
                    else{
                    //-------INSERT Sample Info
                    $query_insert_sample_info = "INSERT INTO sample_info (`sample_id`, `loc_id`, `proj_id`, `year`, `date`, `province`, `u_depth`, `l_depth`, `horizon`, `orig_id`, `notes` ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt_insert_sample = mysqli_prepare($dbc, $query_insert_sample_info);
                    
                    //--Check if stmt is false
                    if($stmt_insert_sample == false) {
                        die("<pre>".mysqli_error($dbc).PHP_EOL.$query_insert_sample_info."</pre>");
                    }
                    
                    mysqli_stmt_bind_param($stmt_insert_sample, "iiiissddsss", $sample_id, $loc_id, $proj_id, $year, $date, $province, $u_depth, $l_depth, $horizon, $orig_id, $notes);
                    
                    mysqli_stmt_execute($stmt_insert_sample);
                    $affected_rows_sample_info = mysqli_stmt_affected_rows($stmt_insert_sample);

                    if($affected_rows_sample_info == 1){                  
                        //INSERT PHYSICAL info-------------------------------------------------------------------------------             
                        $query_insert_physical = "INSERT INTO physical (`sample_id`, `bulkd`, `t_gravel`, `t_clay`, `t_silt`, `t_sand`, `vc_sand`, `c_sand`, `m_sand`, `f_sand`, `vf_sand`, `texture`, `field_txt`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $stmt_insert_physical = mysqli_prepare($dbc, $query_insert_physical);
                        
                        //--Check if stmt is false
                        if($stmt_insert_physical == false) {
                            die("<pre>".mysqli_error($dbc).PHP_EOL.$query_insert_physical."</pre>");
                        }
                        
                        mysqli_stmt_bind_param($stmt_insert_physical, "iddddddddddss", $sample_id, $bulkd, $t_gravel, $t_clay, $t_silt, $t_sand, $vc_sand, $c_sand, $m_sand, $f_sand, $vf_sand, $texture, $field_txt);
                        mysqli_stmt_execute($stmt_insert_physical);
                        $affected_rows_physical = mysqli_stmt_affected_rows($stmt_insert_physical);  
                        if($affected_rows_physical == 1){
                        
                            //INSERT CHEMICAL info-----------------------------------------------------------                      
                            $query_insert_chemical = "INSERT INTO chemical (`sample_id`, `ph_cacl2`, `ph_h2o`, `ttl_c`, `ttl_n`, `caco3`, `org_c`, `org_c_n`, `tec`, `cec`, `ca_exch`, `mg_exch`, `k_exch`, `na_exch`, `avail_pbi`, `avail_pbr`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        
                            $stmt_insert_chemical = mysqli_prepare($dbc, $query_insert_chemical);

                            //--Check if stmt is false
                            if($stmt_insert_chemical == false) {
                            die("<pre>".mysqli_error($dbc).PHP_EOL.$query_insert_chemical."</pre>");
                            }

                            mysqli_stmt_bind_param($stmt_insert_chemical, "sddddddddddddddd", $sample_id, $ph_cacl2, $ph_h2o, $ttl_c, $ttl_n, $caco3, $org_c, $org_c_n, $tec, $cec, $ca_exch, $mg_exch, $k_exch, $na_exch, $avail_pbi, $avail_pbr);   
                            mysqli_stmt_execute($stmt_insert_chemical);
                            $affected_rows_chemical = mysqli_stmt_affected_rows($stmt_insert_chemical);  
                            if($affected_rows_chemical == 1){
                            
                                //Add Archive Jar #1 info -----------------------------------------------------------
                                                    
                                $query_insert_archive_1 = "INSERT INTO archive (`sample_id`, `jar`, `arch_year`, `section`, `arch_col`, `arch_row`, `box_id`) VALUES (?,?,?,?,?,?,?)";
                        
                                $stmt_insert_archive_1 = mysqli_prepare($dbc, $query_insert_archive_1);
                                
                                //--Check if stmt is false
                                if($stmt_insert_archive_1 == false) {
                                die("<pre>".mysqli_error($dbc).PHP_EOL.$query_insert_archive_1."</pre>");
                                }
                        
                                mysqli_stmt_bind_param($stmt_insert_archive_1, "iiissss", $sample_id, $jar_1, $arch_year_jar_1, $section_jar_1, $column_jar_1, $row_jar_1, $box_id_jar_1);
                                mysqli_stmt_execute($stmt_insert_archive_1);
                                $affected_rows_archive_1 = mysqli_stmt_affected_rows($stmt_insert_archive_1);  
                            
                                if($affected_rows_archive_1 == 1){
                                
                                    //Add Archive Jar #2 info -----------------------------------------------------------                      
                                    
                                    if($jar_2_required == "yes") {
                                        $query_insert_archive_2 = "INSERT INTO archive (`sample_id`, `jar`, `arch_year`, `section`, `arch_col`, `arch_row`, `box_id`) VALUES (?,?,?,?,?,?,?)";
                            
                                        $stmt_insert_archive_2 = mysqli_prepare($dbc, $query_insert_archive_2); 

                                        //--Check if stmt is false
                                        if($stmt_insert_archive_2 == false) {
                                        die("<pre>".mysqli_error($dbc).PHP_EOL.$query_insert_archive_2."</pre>");
                                        }
                                
                                        mysqli_stmt_bind_param($stmt_insert_archive_2, "iiissss", $sample_id, $jar_2, $arch_year_jar_2, $section_jar_2, $column_jar_2, $row_jar_2, $box_id_jar_2);
                                        mysqli_stmt_execute($stmt_insert_archive_2);
                                        $affected_rows_archive_2 = mysqli_stmt_affected_rows($stmt_insert_archive_2);

                                        mysqli_stmt_close($stmt_insert_archive_2);
                                    }

                                    if($affected_rows_archive_1 == 1){

                                        include("../functions/output-sample-data.php");             
                                        mysqli_stmt_close($stmt_insert_sample);
                                        mysqli_stmt_close($stmt_insert_physical);
                                        mysqli_stmt_close($stmt_insert_chemical);
                                        mysqli_stmt_close($stmt_insert_archive_1);        
                                        
                                        mysqli_close($dbc);
                                        }
                                        else{
                                            echo "Error!";
                                            echo mysqli_error();
                                        }
                                    }

                                }
                            }   
                        }
                    }
                }
            }    
            else{
            redirect_homepage();
            }
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 my-4 text-center">    
                <a href="add-sample" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>

</body>
</html>