<html>
    <?php
include '../nav-template.php'; 
    ?>
    <head><title>Query Site Info</title>
    
    
    
    </head>
<body> 
     <div class="page-subtitle">
        <p class="big-1" style="width:100%;">Site Information<button id = "myButton" style="float:right;">Start a New Query</button>
        </p>
    </div>
    <div class="page-main-content">    
   
   
        <?php

require '../dbConnect.php';   

$siteInfoField = $_POST['siteInfoField'];

$siteQueryAnswer = $_POST['siteQueryAnswer'];

if ($siteInfoField == "all"){
 
    $siteQuery = "SELECT * FROM site_info";

}else{
    if ($siteQueryAnswer==""){
        echo "Please fill textbox in previous page and try again!";
    }else {
         $siteQuery = "SELECT * FROM site_info WHERE $siteInfoField = '$siteQueryAnswer'";
    }   
}



$siteResponse = @mysqli_query($dbc,$siteQuery);




if($siteResponse){
if(mysqli_num_rows($siteResponse)>0){  
echo '<table id="siteTable"
cellspacing="5" cellpadding="8">
<thead>
<tr>
<td align="left"><b>site Number</b></td>
<td align="left"><b>Site Name</b></td>
<td align="left"><b>Province</b></td>
<td align="left"><b>Location Lat</b></td>
<td align="left"><b>Location Lon</b></td>
<td align="left"><b>Size (ha)</b></td>
<td align="left"><b>Year Est.</b></td>
<td align="left"><b>Ecologital Setting</b></td>


</tr>
</thead>
<tbody>';


 while ($row_querySite = mysqli_fetch_array($siteResponse)){
       echo '<tr>
       <td align="left">' . $row_querySite['site_num'] . '</td>
       <td align="left">' . $row_querySite['site_name'] . '</td>
       <td align="left">' . $row_querySite['site_prov'] . '</td>
       <td align="left">' . $row_querySite['lat_d'] .'°'.$row_querySite['lat_m'].'\''.$row_querySite['lat_s'].'"</td> <td align="left">' . $row_querySite['lon_d'] .'°'.$row_querySite['lon_m'].'\''.$row_querySite['lon_s'].'"</td>
       <td align="left">' . $row_querySite['size_ha'] . '</td>
       <td align="left">' . $row_querySite['year_establish'] . '</td>
       <td align="left">' . $row_querySite['ecol_setting'] . '</td>
</tr>';

}
    echo '</tbody>
    <tfoot>
    <tr>
<th align="left"><b>site Number</b></td>
<th align="left"><b>Site Name</b></td>
<th align="left"><b>Province</b></td>
<th align="left"><b>Location Lat</b></td>
<th align="left"><b>Location Lon</b></td>
<th align="left"><b>Size (ha)</b></td>
<th align="left"><b>Year Est.</b></td>
<th align="left"><b>Ecologital Setting</b></td>
</tr>
</tfoot>
    </table>';
}
    else{
       echo "<table><tr><td>Could not issue database query. Records does not exist!</td></tr></table>";}}
    else{
    //echo "Could not issue database query</br>";
    echo "ERROR: No entries found. Please select a field</br>";
    echo mysqli_error($dbc)."</br>";
}
mysqli_close($dbc);
?>
</div>

    
    <script type="text/javascript">
        
        document.getElementById("myButton").onclick=function(){
                                location.href="query_site.php";
                                };
        
      
        var defaultText = "Search";
        var searchBox = document.getElementById("ssearch");
        searchBox.value = defaultText;
        searchBox.onfocus = function(){
            if (this.value==defaultText){
                this.value = '';
            }
        }
    </script> 
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript"          src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript">
   
	$(document).ready(function(){			
			$('#siteTable tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" style="width:100%" placeholder="Search" />' );
			} );	
            
  $('#siteTable').DataTable( {
		        "scrollY": "350px",
		        "scrollX": true,
		   
		    } ); 
        
			var table = $('#siteTable').DataTable();
 
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
    

</body>
</html>






