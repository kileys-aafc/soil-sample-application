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
    "lengthChange": false,
    "scrollX": true
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
    "lengthChange": false,
    "scrollX": true
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
                        <th>sample_id</th>
                        <th>loc_id</th>        
                        <th>proj_id</th>
                        <th>year</th>
                        <th>date</th>
                        <th>province</th>
                        <th>u_depth</th>
                        <th>l_depth</th>
                        <th>horizon</th>
                        <th>orig_id</th>
                        <th>notes</th>
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
                        <th>loc_id</th>
                        <th>lat_dd</th>
                        <th>long_dd</th>
                        <th>loc_acc</th>
                        <th>map_unit</th>
                        <th>subgroup</th>
                        <th>series</th>
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
                        <th>sample_id</th>
                        <th>t_gravel</th>
                        <th>t_clay</th>
                        <th>t_silt</th>
                        <th>t_sand</th>
                        <th>vc_sand</th>
                        <th>c_sand</th>
                        <th>m_sand</th>
                        <th>f_sand</th>
                        <th>vf_sand</th>
                        <th>u_depth_bd</th>
                        <th>l_depth_bd</th>
                        <th>bulkd</th>
                        <th>texture</th>
                        <th>field_txt</th>
                    </tr>
                </thead>
            <tbody>';
            
            foreach ($data as $row){
                echo'
                <tr>
                    <td>'.$row['sample_id'].'</td>
                    <td>'.$row['t_gravel'].'</td>
                    <td>'.$row['t_clay'].'</td>
                    <td>'.$row['t_silt'].'</td>
                    <td>'.$row['t_sand'].'</td>
                    <td>'.$row['vc_sand'].'</td>
                    <td>'.$row['c_sand'].'</td>
                    <td>'.$row['m_sand'].'</td>
                    <td>'.$row['f_sand'].'</td>
                    <td>'.$row['vf_sand'].'</td>
                    <td>'.$row['bulkd'].'</td>
                    <td>'.$row['u_depth_bd'].'</td>
                    <td>'.$row['l_depth_bd'].'</td>
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
                        <th>sample_id</th>
                        <th>ph_cacl2</th>
                        <th>ph_h2o</th>
                        <th>ttl_c</th>
                        <th>ttl_n</th>
                        <th>caco3</th>
                        <th>org_c</th>
                        <th>org_c_n</th>
                        <th>tec</th>
                        <th>cec</th>
                        <th>al_exch</th>
                        <th>ca_exch</th>
                        <th>k_exch</th>
                        <th>mg_exch</th>
                        <th>na_exch</th>
                        <th>avail_k</th>
                        <th>avail_pbi</th>
                        <th>avail_pbr</th>
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
                <td>'.$row['al_exch'].'</td>
                <td>'.$row['ca_exch'].'</td>
                <td>'.$row['k_exch'].'</td>
                <td>'.$row['mg_exch'].'</td>
                <td>'.$row['na_exch'].'</td>
                <td>'.$row['avail_k'].'</td>
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

