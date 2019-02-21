<title>Scan Results</title>
<?php
    include '../nav-template.php';  
    require '../db-connect.php';
?>

<main role="main">
<div class="container">
    <div class="row justify-content-center" id="instruction" >
        <div class="col-6 text-center">
            <h1 class="display-4">Sample Data</h1>
            <p class="lead my-4">Here is the sample data that was retrieved.</p>  
        </div> 
    </div>
    <hr class="mb-4">    
    <div class="row">
        <div class="col-md">
            <form action="" method="post"> 
            <?php
            if (isset($_POST['sample-id-value'])){
                $sample = $_POST['sample-id-value'];
                $query_sample_info = "SELECT * FROM sample_info WHERE sample_id ='$sample'";
                $sample_info_response = @mysqli_query($dbc, $query_sample_info);
                if($sample_info_response){
                    if(mysqli_num_rows($sample_info_response) > 0){
                        if ($sample_info = mysqli_fetch_array($sample_info_response)){                      
                                              
                            echo'
                            <h4><strong>Sample Info</strong></h4>
                            <table class="table table-secondary table-striped table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <th>Sample ID</th>
                                        <td>'.$sample_info['sample_id'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Location ID</th>
                                        <td>'.$sample_info['loc_id'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Project ID</th>
                                        <td>'.$sample_info['proj_id'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Year</th>
                                        <td>'.$sample_info['year'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date</th>
                                        <td>'.$sample_info['date'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Province</th>
                                        <td>'.$sample_info['province'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Upper Depth</th>
                                        <td>'.$sample_info['u_depth'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lower Depth</th>
                                        <td>'.$sample_info['l_depth'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Horizon</th>
                                        <td>'.$sample_info['horizon'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Original ID</th>
                                        <td>'.$sample_info['orig_id'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Notes</th>
                                        <td>'.$sample_info['notes'].'</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    ';
                }}
                else{
                    echo'
                        ERROR: No entries found. Please check the value you entered.</br>
                        You have entered Sample ID: <strong>$sample</strong> 
                    ';
                    echo mysqli_error($dbc)."</br>";
                }
            }
   
            $query_physical = "SELECT sample_info.sample_id , physical.* FROM sample_info left JOIN physical ON sample_info.sample_id = physical.sample_id where sample_info.sample_id = '$sample' order by sample_info.sample_id";
            $physical_response = @mysqli_query($dbc, $query_physical);
            if($physical_response){
                if(mysqli_num_rows($physical_response) > 0){  
                //---------------RECORDS EXIST-----------   
                    if ($physical = mysqli_fetch_array($physical_response)){
                        echo'
                <div class="col-md">
                <h4><strong>Physical</strong></h4>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Sample ID</th>
                            <td>'.$physical['sample_id'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Bulk Density</th>
                            <td>'.$physical['bulkd'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Gravel %</th>
                            <td>'.$physical['t_gravel'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Clay %</th>
                            <td>'.$physical['t_clay'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Silt %</th>
                            <td>'.$physical['t_silt'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Sand %</th>
                            <td>'.$physical['t_sand'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Very Coarse Sand</th>
                            <td>'.$physical['vc_sand'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Coarse Sand</th>
                            <td>'.$physical['c_sand'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Medium Sand</th>
                            <td>'.$physical['m_sand'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Fine Sand</th>
                            <td>'.$physical['f_sand'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Very Fine Sand</th>
                            <td>'.$physical['vf_sand'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Soil texture</th>
                            <td>'.$physical['texture'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Field Soil Texture</th>
                            <td>'.$physical['field_txt'].'</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                ';
            }}

            else
            {
                echo "ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID:<strong>$sample</strong></br>";
            }}

            else
            {
                echo "<p>ERROR: No entries found. Please select a field</p>";
                //echo mysqli_error($dbc)."</br>";
            }
        
        
        $query_chemical = "SELECT sample_info.sample_id , chemical.* FROM sample_info left JOIN chemical ON sample_info.sample_id = chemical.sample_id where sample_info.sample_id = '$sample' order by sample_info.sample_id";
        $chemical_response = @mysqli_query($dbc, $query_chemical);
        if($chemical_response){
            if(mysqli_num_rows($chemical_response) > 0){  
            //------------------RECORDS EXIST-------------    
        
            if ($chemical = mysqli_fetch_array($chemical_response)){
                echo'
                <div class="col-md">
                <h4><strong>Chemical</strong></h4>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Sample ID</th>
                            <td>'.$chemical['sample_id'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">pH (CaCl<sub>2</sub>)</th>
                            <td>'.$chemical['ph_cacl2'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">pH (H<sub>2</sub>O)</th>
                            <td>'.$chemical['ph_h2o'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Carbon %</th>
                            <td>'.$chemical['ttl_c'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Nitrogen %</th>
                            <td>'.$chemical['ttl_n'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">CaCO<sub>3</sub></th>
                            <td>'.$chemical['caco3'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Organic Carbon %</th>
                            <td>'.$chemical['org_c'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Organic Carbon (Non-Calcareous)</th>
                            <td>'.$chemical['org_c_n'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Exchangable Cations</th>
                            <td>'.$chemical['tec'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Cation Exchange Capacity</th>
                            <td>'.$chemical['cec'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Exchangable Ca</th>
                            <td>'.$chemical['ca_exch'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Exchangable Mg</th>
                            <td>'.$chemical['mg_exch'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Exchangable K</th>
                            <td>'.$chemical['k_exch'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Exchangable Na</th>
                            <td>'.$chemical['na_exch'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Available P (μg/g); NaHCO<sub>3</sub> extractable</th>
                            <td>'.$chemical['avail_pbi'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Available P (μg/g); Bray Method</th>
                            <td>'.$chemical['avail_pbr'].'</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                ';
                                                                                        
            }} 
            else{
                echo "ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID:<strong>$sample</strong></br>";
            }}
            else{
                echo "<p>ERROR: No entries found. Please select a field</p>";
                }
        
        
            $query_archive = "SELECT sample_info.sample_id , archive.* FROM sample_info left JOIN archive ON sample_info.sample_id = archive.sample_id where sample_info.sample_id = '$sample' order by sample_info.sample_id";
            $archive_response = @mysqli_query($dbc, $query_archive);
            if($archive_response){
                if(mysqli_num_rows($archive_response)> 0){  
                //--------------------RECORDS EXIST---------------    
        
                if ($archive = mysqli_fetch_array($archive_response)){
 
                echo'
                </div>
                <div class="row">
                <div class="col-sm-4">
                <h4><strong>Archive</strong></h4>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Sample ID</th>
                            <td>'.$archive['sample_id'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Jar Number</th>
                            <td>'.$archive['jar'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Year Archived</th>
                            <td>'.$archive['arch_year'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Section</th>
                            <td>'.$archive['section'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Column</th>
                            <td>'.$archive['arch_col'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Row</th>
                            <td>'.$archive['arch_row'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Box_id</th>
                            <td>'.$archive['box_id'].'</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                ';
                                                                                        
                }} 
                
                else{
                    echo "ERROR: No entries found. Please check the value you entered.</br>
                    You have entered Sample ID:<strong>$sample</strong></br>";
                }}
                else{
                    echo "<p>ERROR: No entries found. Please select a field</p>";
                }
        
        
            $query_location_info = "SELECT sample_info.loc_id , location_info.* FROM sample_info left JOIN location_info ON sample_info.loc_id = location_info.loc_id where sample_info.sample_id = '$sample' order by sample_info.sample_id";
            $location_info_response = @mysqli_query($dbc, $query_location_info);
            if($location_info_response){
                if(mysqli_num_rows($location_info_response)>0){  
                //-----------------------RECORDS EXIST-------------------------------    
        
                if ($location_info = mysqli_fetch_array($location_info_response)){
 
                echo'
                <div class="col-sm-4">
                <h4><strong>Location Info</strong></h4>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Location ID</th>
                            <td>'.$location_info['loc_id'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Latitude</th>
                            <td>'.$location_info['lat_dd'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Longitude</th>
                            <td>'.$location_info['long_dd'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Location Accuracy</th>
                            <td>'.$location_info['loc_acc'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Soil Map Unit</th>
                            <td>'.$location_info['map_unit'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Soil Subgroup</th>
                            <td>'.$location_info['subgroup'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Soil Series</th>
                            <td>'.$location_info['series'].'</td>
                        </tr>
                    </tbody>
                </table>
                </div></div>
                ';
                                                                                       
                }} 
                
                else{
                    echo "ERROR: No entries found. Please check the value you entered.</br>
                    You have entered Sample ID:<strong>$sample</strong></br>";
                }}
                else{
                    echo "<p>ERROR: No entries found. Please select a field</p>";
                }
                mysqli_close($dbc);
                }
                else{
                    echo "Error!";
                }
?>
</div>    
</form> 
</div>
</body>   
</html>
