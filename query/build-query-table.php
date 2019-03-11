<!-- Bootstrap version of datatables 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
-->

<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> 

<script type="text/javascript"> 

// Sample Info Table
$(document).ready(function(){           
var table = $('#sample_info_table').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
});   
        
        
// Projects Table
$(document).ready(function(){           
var table = $('#projects_table').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
}); 	
        
// Location Info Table
$(document).ready(function(){           
var table = $('#location_info_table').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
});

// Chemical Table
$(document).ready(function(){           
var table = $('#chemical_table').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
});

// Physical Table
        
$(document).ready(function(){           
var table = $('#physical_table').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
});

</script>
        
<?php

function build_query_table($response_samples, $response_locations, $response_projects){

    echo '
    <div class="row justify-content-center mb-3 row"> 
        <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#sample_info_results"  aria-expanded="false" aria-controls="sample_info_results">Sample Info</button>
        <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#projects_results"  aria-expanded="false" aria-controls="projects_results">Projects</button> 
        <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#location_info_results"  aria-expanded="false" aria-controls="location_info_results">Location Info</button>
        <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#physical_results"  aria-expanded="false" aria-controls="physical_results">Physical</button>
        <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#chemical_results"  aria-expanded="false" aria-controls="chemical_results">Chemical</button>
    </div>';

    //--- Sample Info Table ---
    echo '<div id="sample_info_results" class="row collapse show">';

    if($response_samples){
    //--- check if records exist ---   
        if(mysqli_num_rows($response_samples)>0){  
            echo '
            <table id="sample_info_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Sample ID</th>
                        <th>Location ID</th>        
                        <th>Project ID</th>
                        <th>Year</th>
                        <th>Date</th>
                        <th>Province</th>
                        <th>Upper Depth</th>
                        <th>Lower Depth</th>
                        <th>Horizon</th>
                        <th>Original ID</th>
                        <th>Notes</th>
                    </tr>
                </thead>
            <tbody>';
            
            $data = $response_samples -> fetch_all(MYSQLI_ASSOC);
            foreach ($data as $row){
            //--- print out each record as a row ---       
                echo '<tr><td>' . 
                $row['sample_id'] . '</td><td>' . 
                $row['loc_id'] . '</td><td>' . 
                $row['proj_id'] . '</td><td>' .
                $row['year'] . '</td><td>' . 
                $row['date'] . '</td><td>' .
                $row['province'] . '</td><td>' . 
                $row['u_depth'] . '</td><td>' .
                $row['l_depth'] . '</td><td>' . 
                $row['horizon'] . '</td><td>' .
                $row['orig_id'] . '</td><td>'.
                $row['notes'] . '</td>' ;
                 
            }
  
           echo"</tbody>
           </table>";
        }else{
            echo "<table><tr><td>Could not issue database query. Records does not exist in sample Table!</td></tr></table>";
        }
    }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        
    }
    echo'</div>';


    //--- Projects Table ---   
    echo '<div id="projects_results" class="collapse">';
    if($response_projects){
       if(mysqli_num_rows($response_projects)>0){  

        //--- if records exist ---    
        echo'
            <table id="projects_table" class="table table-striped" >
                <thead>
                    <tr class="header">
                        <th>Project ID</th>
                        <th>Project Name</th>
                    </tr>
                </thead>
            <tbody>';

        $projects_data = $response_projects -> fetch_all(MYSQLI_ASSOC);
        foreach ($projects_data as $row){       
        echo'
        <tr>
            <td>'.$row['proj_id'].'</td>
            <td>'.$row['proj_name'].'</td>
        </tr>';
        }
           echo"</tbody></table>";
 
       }else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in site table!</td></tr></table>";
       }
    }else{   
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        
    }
     echo'</div>';

    //--- Location Info Table ---
    echo '<div id="location_info_results" class="collapse">';
    if($response_locations){
        if(mysqli_num_rows($response_locations)>0){  
            echo '
            <table id="location_info_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Location ID</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Location Accuracy</th>
                        <th>Soil Map Unit</th>
                        <th>Soil Subgroup</th>
                        <th>Soil Series</th>
                    </tr>
                </thead>
                <tbody>';
        $locations_data = $response_locations -> fetch_all(MYSQLI_ASSOC);
        foreach ($locations_data as $row){
            echo 
            '<tr>
                <td>'.$row['loc_id'].'</td>
                <td>'.$row['lat_dd'].'</td>
                <td>'.$row['long_dd'].'</td>
                <td>'.$row['loc_acc'].'</td>
                <td>'.$row['map_unit'].'</td>
                <td>'.$row['subgroup'].'</td>
                <td>'.$row['series'].'</td>
            ';}
            echo"</tr></tbody></table>";
        } 
        else{
            echo "<table><tr><td>Could not issue database query. Records does not exist in physical table!</td></tr></table>";
        }
    }
    else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        
    }
    echo'</div>';

    //--- Physical table
    echo '<div id="physical_results" class="collapse">';
    if($response_samples){
        if(mysqli_num_rows($response_samples)>0){  
        //--- records exists --- 
            echo '
            <table id="physical_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Sample ID</th>
                        <th>Bulk Density</th>
                        <th>Total Gravel</th>
                        <th>Total Clay</th>
                        <th>Total Silt</th>
                        <th>Total Sand</th>
                        <th>Very Coarse Sand</th>
                        <th>Coarse Sand</th>
                        <th>Medium Sand</th>
                        <th>Fine Sand</th>
                        <th>Very Fine Sand</th>
                        <th>Texture</th>
                        <th>Field Texture</th>
                    </tr>
                </thead>
            <tbody>';
            
            foreach ($data as $row){
                echo'
                <tr>
                    <td>'.$row['sample_id'].'</td>
                    <td>'.$row['bulkd'].'</td>
                    <td>'.$row['t_gravel'].'</td>
                    <td>'.$row['t_clay'].'</td>
                    <td>'.$row['t_silt'].'</td>
                    <td>'.$row['t_sand'].'</td>
                    <td>'.$row['vc_sand'].'</td>
                    <td>'.$row['c_sand'].'</td>
                    <td>'.$row['m_sand'].'</td>
                    <td>'.$row['f_sand'].'</td>
                    <td>'.$row['vf_sand'].'</td>
                    <td>'.$row['texture'].'</td>
                    <td>'.$row['field_txt'].'</td>
                </tr>' ;
            }
        echo"</tbody></table>";           
        } 
        else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in chemical table!</td></tr></table>";
        }
    }
    else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
    }
    echo'</div>';

    //--- chemical
    echo '<div id="chemical_results" class="collapse">';
    if($response_samples){
        if(mysqli_num_rows($response_samples)>0){  
        //--- records exists ---    
            echo '
            <table id="chemical_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Sample ID</th>
                        <th>pH (CaCl<sub>2</sub>)</th>
                        <th>pH (H<sub>2</sub>O)</th>
                        <th>Total C</th>
                        <th>Total N</th>
                        <th>CaCO<sub>3</sub></th>
                        <th>org_c</th>
                        <th>org_c_n</th>
                        <th>Total Exchangable Cations</th>
                        <th>Cation Exchange Capacity</th>
                        <th>Exchangable Ca</th>
                        <th>Exchangable Mg</th>
                        <th>Exchangable K</th>
                        <th>Exchangable Na</th>
                        <th>Available P (NaHCO<sub>3</sub>)</th>
                        <th>Available P (Bray)</th>
                    </tr>
                </thead>
            <tbody>';
        
            foreach ($data as $row){
            echo '
            <tr>
                <td>'.$row['sample_id'].'</td>
                <td>'.$row['ph_cacl2'].'</td>
                <td>'.$row['ph_h2o'].'</td>
                <td>'.$row['ttl_c'].'</td>
                <td>'.$row['ttl_n'].'</td>
                <td>'.$row['caco3'].'</td>
                <td>'.$row['org_c'].'</td>
                <td>'.$row['org_c_n'].'</td>
                <td>'.$row['tec'].'</td>
                <td>'.$row['cec'].'</td>
                <td>'.$row['ca_exch'].'</td>
                <td>'.$row['mg_exch'].'</td>
                <td>'.$row['k_exch'].'</td>
                <td>'.$row['na_exch'].'</td>
                <td>'.$row['avail_pbi'].'</td>
                <td>'.$row['avail_pbr'].'</td>
            </tr>    
                ';
            }
        echo"</tbody></table>";
        } 
        else{
            echo "<table><tr><td>Could not issue database query. Records does not exist in soil biome table!</td></tr></table>";
        }
    }
    else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
    }
    echo'</div>';
}
?>

