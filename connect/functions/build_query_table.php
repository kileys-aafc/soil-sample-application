<!-- <html>
    <head>
    <style>
    
        table{

            width:100%;
            border: 2px solid #b9baaa;
            border-radius: 0px 0px 5px 5px;
            background: #c8c8c0;   
        }

       
        td,th{
            border-bottom:1px solid #b9baaa;
            border-right:1px solid #b9baaa;
            text-align: center;
            white-space: nowrap;
        }
        
        tr{
            height: 60px;
        }
        
        tfoot tr{
            height: 30px;
        }    
        thead tr{
            height:60px;
        }
      
        .tabcontent{
            border: 2px solid #b9baaa;
            background: #c8c8c0;
        }
    </style> -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript"          src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"          src="//cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript"> 
		$(document).ready(function(){	
            
          
			$('#myTable tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" style="width:100%" placeholder="Search" />' );
			} );
            
         
            /*
            $('#myTable').DataTable( {
		        "scrollY": "300px",
                "scrollCollapse": true,
		        "scrollX": true,
                "paging": false,
		    } );
 */
            
			var table = $('#myTable').DataTable();
 
			table.columns().every( function () 
			{   
				var that = this;
 
				$( 'input', this.footer() ).on( 'keyup change', function () 
				{
					if ( that.search() !== this.value ) 
					{
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );   
        
        
        //---------------------------------2. SITE INFO TABLE
        $(document).ready(function(){			
			$('#myTable2 tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" style="width:100%" placeholder="Search" />' );
			} );	
           
            
			var table = $('#myTable2').DataTable();
 
			table.columns().every( function () 
			{
				var that = this;
 
				$( 'input', this.footer() ).on( 'keyup change', function () 
				{
					if ( that.search() !== this.value ) 
					{
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );	
        
        //---------------------------------3. PHYSICAL TABLE

        $(document).ready(function(){			
			$('#myTable3 tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" style="width:100%" placeholder="Search" />' );
			} );	
            
			var table = $('#myTable3').DataTable();
 
			table.columns().every( function () 
			{
				var that = this;
 
				$( 'input', this.footer() ).on( 'keyup change', function () 
				{
					if ( that.search() !== this.value ) 
					{
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );
                //---------------------------------4.CHEMICAL TABLE

        $(document).ready(function(){			
			$('#myTable4 tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" style="width:100%" placeholder="Search" />' );
			} );	
            
			var table = $('#myTable4').DataTable();
 
			table.columns().every( function () 
			{
				var that = this;
 
				$( 'input', this.footer() ).on( 'keyup change', function () 
				{
					if ( that.search() !== this.value ) 
					{
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );
           
        //---------------------------------5. SOIL BIOME TABLE
        
        $(document).ready(function(){			
			$('#myTable5 tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" style="width:100%" placeholder="Search" />' );
			} );	
            
			var table = $('#myTable5').DataTable();
 
			table.columns().every( function () 
			{
				var that = this;
 
				$( 'input', this.footer() ).on( 'keyup change', function () 
				{
					if ( that.search() !== this.value ) 
					{
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );
        
        //---------------------------------6. SOIL-SPECTRAL TABLE
        
        $(document).ready(function(){			
			$('#myTable6 tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" style="width:100%" placeholder="Search" />' );
			} );	
            
			var table = $('#myTable6').DataTable();
 
			table.columns().every( function () 
			{
				var that = this;
 
				$( 'input', this.footer() ).on( 'keyup change', function () 
				{
					if ( that.search() !== this.value ) 
					{
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );
    </script>
        
    </head>

<?php

function build_query_table($response,$response2,$response3,$response4,$response5,$response6){
    echo "<div id=\"dataTableWrap\">";
    
    echo '<div id="tabNum1" class="tabcontent">';
    if($response){
//-----------------------check if RECORDS EXIST-------------------------------    
        if(mysqli_num_rows($response)>0){  
//-----------------------print out the table head roll----------Please modify if add/delete fields---------------   
            echo '
            <table id="myTable" >
            <thead>
            <tr>
            <th>Sample ID</th>
            <th>Site Number</th>        
            <th>Field ID</th>
            <th>Site Type</th>
            <th>Year</th>
            <th>Sample Number</th>
            <th>Lab Number</th>
            <th>Zone</th>
            <th>Shelf</th>
            <th>Level</th>
            <th>Row</th>
            <th>Box</th>
            <th>Barcode (Lab NO.)</th>
            </tr>
            </thead>
            <tbody>';
            while ($row = mysqli_fetch_array($response)){
//-----------------------print out each record as a roll-------Please modify if add/delete fields---------------       
                echo '<tr><td>' . 
                $row['0'] . '</td><td>' . 
                $row['site_num'] . '</td><td>' . 
                $row['field_id'] . '</td><td>' .
                $row['site_type'] . '</td><td>' . 
                $row['year'] . '</td><td>' .
                $row['sample_num'] . '</td><td>' . 
                $row['lab_num'] . '</td><td>' .
                $row['zone'] . '</td><td>' . 
                $row['shelf'] . '</td><td>' .
                $row['level'] . '</td><td>'.
                $row['row'] . '</td><td>'.
                $row['box'] . '</td><td>'  ;
                $img = "<img src=\"https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".$row['lab_num']."&choe=UTF-8\" title=\""."test"."\" />";  
                echo $img.'</tr>';
            }
//-----------------------print out table foot----------Please modify if add/delete fields---------------   
           echo"</tbody>
               <tfoot>
                    <tr>
                        <th>Sample ID</th>
                        <th>Site Number</th>        
                        <th>Field ID</th>
                        <th>Site Type</th>
                        <th>Year</th>
                        <th>Sample Number</th>
                        <th>Lab Number</th>
                        <th>Zone</th>
                        <th>Shelf</th>
                        <th>Level</th>
                        <th>Row</th>
                        <th>Box</th>
                        <th>Barcode (Lab NO.)</th>
                    </tr>
               </tfoot>
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
     echo '<div id="tabNum2" class="tabcontent">';
    if($response2){
       if(mysqli_num_rows($response2)>0){  

    //-----------------------RECORDS EXIST-------------------------------    
            echo '
            <table id="myTable2" >
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



           echo"</tbody><tfoot><tr>  
                <th>Sample ID</th>
                <th>site Number</th>
                <th>Site Name</th>
                <th>Province</th>
                <th>Location Lat</th>
                <th>Location Lon</th>
                <th>Size (ha)</th>
                <th>Year Est.</th>
                <th>Ecologital Setting</th>
            </tr>";
        echo '</tfoot></table>';

    
       }else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in site table!</td></tr></table>";
       }
    }else{   
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        //echo mysqli_error($dbc)."</br>";
    }
     echo'</div>';
   
    
//----------------------tab 3  [physical table]
   echo '<div id="tabNum3" class="tabcontent">';
    if($response3){
       if(mysqli_num_rows($response3)>0){  
            echo '
            <table id="myTable3" >
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


           echo"</tr></tbody><tfoot><tr>
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
           </tr>";
        echo '</tfoot></table>';


       
       } else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in physical table!</td></tr></table>";
       }
    }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';


//----------------------------tab 4 [chemical table]
    echo '<div id="tabNum4" class="tabcontent">';
    if($response4){
       if(mysqli_num_rows($response4)>0){  
    //-----------------------RECORDS EXIST-------------------------------    
            echo '
            <table id="myTable4">
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


           echo"</tr></tbody><tfoot><tr>
                <th>Sample ID </th>
                    <th>ORG_MTR</th>
                    <th>CEC</th>
                    <th>BUFFER_PH</th>
                    <th>PER_K</th>
                    <th>PER_MG</th>
                    <th>PER_CA</th>
                    <th>PER_NA</th>
                    </tr>";
        echo '</tfoot></table>';


       
       } else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in chemical table!</td></tr></table>";
       }
    }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
       //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';
   
    
//----------------------------------tab 5 [soil biome table]
    
    echo '<div id="tabNum5" class="tabcontent">';
    if($response5){
       if(mysqli_num_rows($response5)>0){  
    //-----------------------RECORDS EXIST-------------------------------    
            echo '
            <table id="myTable5">
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


           echo"</tr></tbody><tfoot><tr>
                <th>Sample ID </th>
                    <th>Biome01</th>
                    <th>Biome02</th>
                    <th>Biome03</th>
                    <th>Biome04</th>
                    <th>Biome05</th>
                    <th>Biome06</th>             
            </tr>";
        echo '</tfoot></table>';
       } else{
           echo "<table><tr><td>Could not issue database query. Records does not exist in soil biome table!</td></tr></table>";
       }
    }else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
       //echo mysqli_error($dbc)."</br>";
    }
    echo'</div>';
    
    
//------------------------------------tab6 [soil spectral table]
      echo '<div id="tabNum6" class="tabcontent">';
    if($response6){
       if(mysqli_num_rows($response6)>0){  
    //-----------------------RECORDS EXIST-------------------------------    
            echo '
            <table id="myTable6">
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


           echo"</tr></tbody><tfoot><tr>

            <th>Sample ID </th>
                    <th>Spectral01</th>
                    <th>Spectral02</th>
                    <th>Spectral03</th>            
           </tr>";
        echo '</tfoot></table>';
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

<!--   </html> -->