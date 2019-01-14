<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>


<!-- <script type="text/javascript" src="//cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script> -->
<script type="text/javascript"> 
//Sample Results Table
$(document).ready(function(){           
var table = $('#myTable').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
});   
        
        
// SITE INFO TABLE
$(document).ready(function(){           
var table = $('#myTable2').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
}); 	
        
// PHYSICAL TABLE
$(document).ready(function(){           
var table = $('#myTable3').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
});

// CHEMICAL TABLE
$(document).ready(function(){           
var table = $('#myTable4').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
});

// SOIL BIOME TABLE
        
$(document).ready(function(){           
var table = $('#myTable5').DataTable({
    "columnDefs": [{
        "targets": '_all',
        "searchable": false
        }],
    "searching": false,
    "lengthChange": false
    });
});
        
// SOIL-SPECTRAL TABLE
        
$(document).ready(function(){           
var table = $('#myTable6').DataTable({
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

function build_query_table($response,$response2,$response3,$response4,$response5,$response6){

    echo '<div class="row justify-content-center mb-3 row"> 
    <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#sampleTableResults"  aria-expanded="false" aria-controls="sampleTableResults">Sample Results</button>
    <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#siteTableResults"  aria-expanded="false" aria-controls="siteTableResults">Site Results</button> 
    <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#physicalTableResults"  aria-expanded="false" aria-controls="physicalTableResults">Physical Results</button>
    <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#chemicalTableResults"  aria-expanded="false" aria-controls="chemicalTableResults">Chemical Results</button>
    <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#biomeTableResults"  aria-expanded="false" aria-controls="biomeTableResults">Biome Results</button>
    <button class="btn btn-outline-success mx-2" type="button" data-toggle="collapse" data-target="#spectralTableResults"  aria-expanded="false" aria-controls="spectralTableResults">Spectral Results</button>
    </div>';

    echo '<div id="sampleTableResults" class="row collapse show">';

    if($response){
//-----------------------check if RECORDS EXIST-------------------------------    
        if(mysqli_num_rows($response)>0){  
//-----------------------print out the table head roll----------Please modify if add/delete fields---------------   
            echo '
            <table id="myTable" class="table table-striped" >
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
            while ($row = mysqli_fetch_array($response)){
//-----------------------print out each record as a roll-------Please modify if add/delete fields---------------       
                echo '<tr><td>' . 
                $row['0'] . '</td><td>' . 
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
//-----------------------print out table foot----------Please modify if add/delete fields---------------   
           echo"</tbody>
           </table>";
        }else{
            echo "<table><tr><td>Could not issue database query. Records does not exist in sample Table!</td></tr></table>";
        }
    }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';


//----------------------tab 2  [site_info table]    
     echo '<div id="siteTableResults" class="collapse">';
    if($response2){
       if(mysqli_num_rows($response2)>0){  

    //-----------------------RECORDS EXIST-------------------------------    
            echo '
            <table id="myTable2" class="table table-striped" >
            <thead>
            <tr class="header" >
                <th>Sample ID</th>
                <th>site Number</th>
                <th>Site Name</th>
                <th>Province</th>
                <th>Location Lat</th>
                <th>Location Lon</th>
                <th>Size (ha)</th>
                <th>Year Est.</th>
                <th>Ecologital Setting</th>
            </tr>
            </thead>
            <tbody>';


       while ($row_querySite = mysqli_fetch_array($response2)){       
           echo '<tr>
          <td>' . $row_querySite['sample_id'] . '</td>
           <td>' . $row_querySite['site_num'] . '</td>
           <td>' . $row_querySite['site_name'] . '</td>
           <td>' . $row_querySite['site_prov'] . '</td>
           <td>' . $row_querySite['lat_d'] .'°'.$row_querySite['lat_m'].'\''.$row_querySite['lat_s'].'"</td> 
           <td>' . $row_querySite['lon_d'] .'°'.$row_querySite['lon_m'].'\''.$row_querySite['lon_s'].'"</td>
           <td>' . $row_querySite['size_ha'] . '</td>
           <td>' . $row_querySite['year_establish'] . '</td>
           <td>' . $row_querySite['ecol_setting'] . '</td>
    </tr>';
       }



           echo"</tbody></table>";

    
       }else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in site table!</td></tr></table>";
       }
    }else{   
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        //echo mysqli_error($dbc)."</br>";
    }
     echo'</div>';
   
    
//----------------------tab 3  [physical table]
   echo '<div id="physicalTableResults" class="collapse">';
    if($response3){
       if(mysqli_num_rows($response3)>0){  
            echo '
            <table id="myTable3" class="table table-striped">
                <thead>
                    <tr>

                    <th>SAMP_ID</th>
                    <th>LAB</th>
                    <th>LOCATION</th>
                    <th>DEPTH</th>
                    <th>Sand</th>
                    <th>Clay</th>
                    <th>Silt</th>
                    <th>Sand_VC</th>
                    <th>Sand_C</th>
                    <th>Sand_M</th>
                    <th>Sand_F</th>
                    <th>Sand_VF</th>
                    </tr>
                </thead>
            <tbody>';
       while ($row_QueryPhy = mysqli_fetch_array($response3)){
           echo '<tr><td>' . 

            $row_QueryPhy[0] . '</td><td>' .
            $row_QueryPhy['LAB'] . '</td><td>' . 
            $row_QueryPhy['LOCATION'] . '</td><td>' . 
            $row_QueryPhy['DEPTH'] . '</td><td>' .
            $row_QueryPhy['SAND'] . '</td><td>' . 
            $row_QueryPhy['CLAY'] . '</td><td>' .
            $row_QueryPhy['SILT'] . '</td><td>' .
            $row_QueryPhy['SAND_VC'] . '</td><td>' . 
            $row_QueryPhy['SAND_C'] . '</td><td>' .
            $row_QueryPhy['SAND_M'] . '</td><td>'.
            $row_QueryPhy['SAND_F'] . '</td><td>'.
            $row_QueryPhy['SAND_VF'] . '</td>' ;
            }


           echo"</tr></tbody></table>";


       
       } else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in physical table!</td></tr></table>";
       }
    }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';


//----------------------------tab 4 [chemical table]
    echo '<div id="chemicalTableResults" class="collapse">';
    if($response4){
       if(mysqli_num_rows($response4)>0){  
    //-----------------------RECORDS EXIST-------------------------------    
            echo '
            <table id="myTable4" class="table table-striped">
                <thead>
                    <tr>
                    <th>Sample ID </th>
                    <th>ORG_MTR</th>
                    <th>CEC</th>
                    <th>BUFFER_PH</th>
                    <th>PER_K</th>
                    <th>PER_MG</th>
                    <th>PER_CA</th>
                    <th>PER_NA</th>
                    </tr>
                </thead>
            <tbody>';
       while ($row_QueryChe = mysqli_fetch_array($response4)){
           echo '<tr><td>' . 
            $row_QueryChe[0] . '</td><td>' .
            $row_QueryChe['ORG_MTR'] . '</td><td>' .
            $row_QueryChe['CEC'] . '</td><td>' .
            $row_QueryChe['BUFFER_PH'] . '</td><td>' .
            $row_QueryChe['PER_K'] . '</td><td>' .
            $row_QueryChe['PER_MG'] . '</td><td>' .
            $row_QueryChe['PER_CA'] . '</td><td>' .
            $row_QueryChe['PER_NA'] . '</td>' ;
       }


           echo"</tr></tbody></table>";


       
       } else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in chemical table!</td></tr></table>";
       }
    }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
       //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';
   
    
//----------------------------------tab 5 [soil biome table]
    
    echo '<div id="biomeTableResults" class="collapse" >';
    if($response5){
       if(mysqli_num_rows($response5)>0){  
    //-----------------------RECORDS EXIST-------------------------------    
            echo '
            <table id="myTable5" class="table table-striped">
                <thead>
                    <tr>
                    <th>Sample ID </th>
                    <th>Biome01</th>
                    <th>Biome02</th>
                    <th>Biome03</th>
                    <th>Biome04</th>
                    <th>Biome05</th>
                    <th>Biome06</th>                   
                    </tr>
                </thead>
            <tbody>';
       while ($row_QueryPhy = mysqli_fetch_array($response5)){
           echo '<tr><td>' . 
            $row_QueryPhy[0] . '</td><td>' .
            $row_QueryPhy['biome01'] . '</td><td>' .
            $row_QueryPhy['biome02'] . '</td><td>' .
            $row_QueryPhy['biome03'] . '</td><td>' .
            $row_QueryPhy['biome04'] . '</td><td>' .
            $row_QueryPhy['biome05'] . '</td><td>' .
            $row_QueryPhy['biome06'] . '</td>' ;
            }


           echo"</tr></tbody>></table>";
       } else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in soil biome table!</td></tr></table>";
       }
    }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
       //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';
    
    
//------------------------------------tab6 [soil spectral table]
      echo '<div id="spectralTableResults" class="collapse">';
    if($response6){
       if(mysqli_num_rows($response6)>0){  
    //-----------------------RECORDS EXIST-------------------------------    
            echo '
            <table id="myTable6" class="table table-striped">
                <thead>
                    <tr>
                    <th>Sample ID </th>
                    <th>Spectral01</th>
                    <th>Spectral02</th>
                    <th>Spectral03</th>
                    
                    </tr>
                </thead>
            <tbody>';
       while ($row_QueryPhy = mysqli_fetch_array($response6)){
           echo '<tr><td>' . 
            $row_QueryPhy[0] . '</td><td>' .
            $row_QueryPhy['spectral01'] . '</td><td>' .
            $row_QueryPhy['spectral02'] . '</td><td>' .
            $row_QueryPhy['spectral03'] . '</td>' ;
            }


           echo"</tr></tbody></table>";
       } else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in soil spectral table!</td></tr></table>";
       }
   }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
       //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';
    echo "</div>";
    
}
?>

