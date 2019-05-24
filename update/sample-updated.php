<head><title>Sample Updated</title></head>
<?php 
include '../nav-template.php'; 
include '../functions/check-admin.php';
check_admin();
?>

<main role="main">       
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-6 text-center">
            <h1 class="display-4">Sample Updated</h1>
            <p class="lead my-4">Here is the updated sample data.</p>  
        </div> 
    </div>
    <div class="row">
    	<hr class="mb-4">
	</div>
</div>   
	<?php        
        if(isset($_POST['update-sample'])){
		//------Sample info from $_POST[] --------
		$sample_id = $_POST['sample_id'];
		$loc_id = $_POST['loc_id'];        
		$proj_id = $_POST['proj_id'];    
		$year = $_POST['year'];
		if($_POST['date'] == ""){$date = "NULL";}else{$date = $_POST['date'];}
		$province = $_POST['province'];
		$u_depth = $_POST['u_depth'];
		$l_depth = $_POST['l_depth'];
		$horizon = trim($_POST['horizon']);
		$orig_id = $_POST['orig_id'];
		$notes = $_POST['notes'];
		//------Physical info from $_POST[] --------
		if($_POST['t_gravel'] == ""){$t_gravel = "NULL";}else{$t_gravel = $_POST['t_gravel'];}
		if($_POST['t_clay'] == ""){$t_clay = "NULL";}else{$t_clay = $_POST['t_clay'];}
		if($_POST['t_silt'] == ""){$t_silt = "NULL";}else{$t_silt = $_POST['t_silt'];}
		if($_POST['t_sand'] == ""){$t_sand = "NULL";}else{$t_sand = $_POST['t_sand'];}
		if($_POST['vc_sand'] == ""){$vc_sand = "NULL";}else{$vc_sand = $_POST['vc_sand'];}
		if($_POST['c_sand'] == ""){$c_sand = "NULL";}else{$c_sand = $_POST['c_sand'];}
		if($_POST['m_sand'] == ""){$m_sand = "NULL";}else{$m_sand = $_POST['m_sand'];}
		if($_POST['f_sand'] == ""){$f_sand = "NULL";}else{$f_sand = $_POST['f_sand'];}
		if($_POST['vf_sand'] == ""){$vf_sand = "NULL";}else{$vf_sand = $_POST['vf_sand'];}
		if($_POST['u_depth_bd'] == ""){$u_depth_bd = "NULL";}else{$u_depth_bd = $_POST['u_depth_bd'];}
		if($_POST['l_depth_bd'] == ""){$l_depth_bd = "NULL";}else{$l_depth_bd = $_POST['l_depth_bd'];}
		if($_POST['bulkd'] == ""){$bulkd = "NULL";}else{$bulkd = $_POST['bulkd'];}
		$texture = $_POST['texture'];
		$field_txt = $_POST['field_txt'];
		//------Chemical info from $_POST[]--------
		if($_POST['ph_cacl2'] == ""){$ph_cacl2 = "NULL";}else{$ph_cacl2 = $_POST['ph_cacl2'];}
		if($_POST['ph_h2o'] == ""){$ph_h2o = "NULL";}else{$ph_h2o = $_POST['ph_h2o'];}
		if($_POST['ttl_c'] == ""){$ttl_c = "NULL";}else{$ttl_c = $_POST['ttl_c'];}
		if($_POST['ttl_n'] == ""){$ttl_n = "NULL";}else{$ttl_n = $_POST['ttl_n'];}
		if($_POST['caco3'] == ""){$caco3 = "NULL";}else{$caco3 = $_POST['caco3'];}
		if($_POST['org_c'] == ""){$org_c = "NULL";}else{$org_c = $_POST['org_c'];}
		if($_POST['org_c_n'] == ""){$org_c_n = "NULL";}else{$org_c_n = $_POST['org_c_n'];}
		if($_POST['tec'] == ""){$tec = "NULL";}else{$tec = $_POST['tec'];}
		if($_POST['cec'] == ""){$cec = "NULL";}else{$cec = $_POST['cec'];}
		if($_POST['al_exch'] == ""){$al_exch = "NULL";}else{$al_exch = $_POST['al_exch'];} 
		if($_POST['ca_exch'] == ""){$ca_exch = "NULL";}else{$ca_exch = $_POST['ca_exch'];} 
		if($_POST['mg_exch'] == ""){$mg_exch = "NULL";}else{$mg_exch = $_POST['mg_exch'];}
		if($_POST['k_exch'] == ""){$k_exch = "NULL";}else{$k_exch = $_POST['k_exch'];}
		if($_POST['na_exch'] == ""){$na_exch = "NULL";}else{$na_exch = $_POST['na_exch'];}
		if($_POST['avail_k'] == ""){$avail_k = "NULL";}else{$avail_k = $_POST['avail_k'];}
		if($_POST['avail_pbi'] == ""){$avail_pbi = "NULL";}else{$avail_pbi = $_POST['avail_pbi'];}   
		if($_POST['avail_pbr'] == ""){$avail_pbr = "NULL";}else{$avail_pbr = $_POST['avail_pbr'];}
		//------Archive Jar #1 info from $_POST[]--------
		$jar_1 = $_POST['jar_1'];
		$arch_year_jar_1 = $_POST['arch_year_jar_1'];
		$section_jar_1 = strtoupper($_POST['section_jar_1']);
		$column_jar_1 = strtoupper($_POST['column_jar_1']);
		$row_jar_1 = $_POST['row_jar_1'];
		$box_id_jar_1 = $_POST['box_id_jar_1'];
		$weight_jar_1 = $_POST['weight_jar_1'];
		//------Archive Jar #2 info from $_POST[]--------
		$jar_2 = 2;
		$jar_2_required = $_POST['jar_2_required'];
		if(isset($_POST['arch_year_jar_2'])){$arch_year_jar_2 = $_POST['arch_year_jar_2'];};
		if(isset($_POST['section_jar_2'])){$section_jar_2 = strtoupper($_POST['section_jar_2']);};
		if(isset($_POST['column_jar_2'])){$column_jar_2 = strtoupper($_POST['column_jar_2']);};
		if(isset($_POST['row_jar_2'])){$row_jar_2 = $_POST['row_jar_2'];};
		if(isset($_POST['box_id_jar_2'])){$box_id_jar_2 = $_POST['box_id_jar_2'];};
		if(isset($_POST['weight_jar_2'])){$weight_jar_2 = $_POST['weight_jar_2'];};

	

	   require '../db-connect.php';
	   
	   

//-----------------Sample Info Update Query------------
		$query_update = "UPDATE sample_info SET loc_id='$loc_id', proj_id='$proj_id', year=$year, date=STR_TO_DATE('$date','%Y-%m-%d'), province='$province', u_depth='$u_depth', l_depth='$l_depth', horizon='$horizon', orig_id='$orig_id', notes='$notes' WHERE sample_id='$sample_id';";      

//-----------------Physical Update Query------------
        $query_update .= "INSERT INTO physical (sample_id, t_gravel, t_clay, t_silt, t_sand, vc_sand, c_sand, m_sand, f_sand, vf_sand, u_depth_bd, l_depth_bd, bulkd, texture, field_txt) VALUES ('$sample_id','$t_gravel','$t_clay','$t_silt','$t_sand','$vc_sand','$c_sand','$m_sand','$f_sand','$vf_sand','$u_depth_bd','$l_depth_bd','$bulkd','$texture','$field_txt')
        				ON DUPLICATE KEY UPDATE t_gravel=$t_gravel, t_clay=$t_clay, t_silt=$t_silt, t_sand=$t_sand, vc_sand=$vc_sand, c_sand=$c_sand, m_sand=$m_sand, f_sand=$f_sand, vf_sand=$vf_sand, u_depth_bd=$u_depth_bd, l_depth_bd=$l_depth_bd, bulkd=$bulkd, texture='$texture', field_txt='$field_txt' ;";
     
//-----------------Chemical Update Query------------             
        $query_update .= "INSERT INTO chemical (sample_id, ph_cacl2, ph_h2o, ttl_c, ttl_n, caco3, org_c, org_c_n, tec, cec, al_exch, ca_exch, k_exch, mg_exch, na_exch, avail_k, avail_pbi, avail_pbr) VALUES ('$sample_id', '$ph_cacl2', '$ph_h2o', '$ttl_c', '$ttl_n', '$caco3', '$org_c', '$org_c_n', '$tec', '$cec', '$al_exch', '$ca_exch', '$k_exch', '$mg_exch', '$na_exch', '$avail_k', '$avail_pbi', '$avail_pbr')
        ON DUPLICATE KEY UPDATE ph_cacl2=$ph_cacl2, ph_h2o=$ph_h2o, ttl_c=$ttl_c, ttl_n=$ttl_n, caco3=$caco3, org_c=$org_c, org_c_n=$org_c_n, tec=$tec, cec=$cec, al_exch=$al_exch, ca_exch=$ca_exch, k_exch=$k_exch, mg_exch=$mg_exch, na_exch=$na_exch, avail_k=$avail_k, avail_pbi=$avail_pbi, avail_pbr=$avail_pbr ;";
           
//-----------------Archive Jar #1 Update Query------------
        $query_update .= "INSERT INTO archive (sample_id, jar, arch_year, section, arch_col, arch_row, box_id, weight) VALUES('$sample_id', '$jar_1', '$arch_year_jar_1','$section_jar_1', '$column_jar_1', '$row_jar_1', '$box_id_jar_1', '$weight_jar_1') 
        ON DUPLICATE KEY UPDATE jar=$jar_1, arch_year=$arch_year_jar_1, section='$section_jar_1', arch_col='$column_jar_1', arch_row='$row_jar_1', box_id='$box_id_jar_1', weight=$weight_jar_1;";
           
//-----------------Archive Jar #2 Update Query------------
		//-- Check if Jar #2 is required --- 
		if($jar_2_required == "yes"){
			$query_update .= "INSERT INTO archive (sample_id, jar, arch_year, section, arch_col, arch_row, box_id, weight) VALUES('$sample_id', '$jar_2', '$arch_year_jar_2', '$section_jar_2', '$column_jar_2', '$row_jar_2', '$box_id_jar_2', '$weight_jar_2') 
			ON DUPLICATE KEY UPDATE jar=$jar_2, arch_year=$arch_year_jar_2, section='$section_jar_2', arch_col='$column_jar_2', arch_row='$row_jar_2', box_id='$box_id_jar_2', weight='$weight_jar_2';";
		};  

        $query_update .= "SELECT * FROM sample_info, physical, chemical, archive WHERE sample_info.sample_id = $sample_id and sample_info.sample_id = physical.sample_id and sample_info.sample_id = chemical.sample_id and sample_info.sample_id = archive.sample_id";
            
        $update_response = mysqli_multi_query($dbc, $query_update);
        
        if($update_response){
        	do{ 
            	if($result=mysqli_store_result($dbc)){
                    while($row = mysqli_fetch_row($result)){						
					}
					//----Output Updated Sample Data ---
					include("../functions/output-sample-data.php");
					mysqli_free_result($result);
				}
			}
            while(mysqli_next_result($dbc));
        }
      
      	else{
			echo "RESPONSE SHOW UPDATE FAIL</br>
			ERROR: Could not issue database query</br>";
			echo mysqli_error($dbc)."</br>";
		}            
mysqli_close($dbc);  
}

else{
	echo "error updating";
}
        
?>  
<div class="container">       
	<div class="row justify-content-center">
		<div class="col-6 my-4 text-center">    
			<a href="update-sample.php"><button class="btn btn-primary">Back</button></a>
		</div>
    </div>
</div>
</body>
</html>