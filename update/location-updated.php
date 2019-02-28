<head><title>Location Updated</title></head>
<?php include '../nav-template.php'; ?>

<main role="main">       
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-6 text-center">
            <h1 class="display-4">Location Updated</h1>
            <p class="lead my-4">Here is the updated location data.</p>  
        </div> 
    </div>
    <div class="row">
    	<hr class="mb-4">
	</div>
</div>   
	<?php        
        if(isset($_POST['update-location'])){
		//------Project info from $_POST[] --------
		$loc_id = $_POST['loc_id'];
		$lat_dd = $_POST['lat_dd'];
		$long_dd = $_POST['long_dd'];
		$loc_acc = $_POST['loc_acc'];
		$map_unit = $_POST['map_unit'];
		$subgroup = $_POST['subgroup'];
		$series = $_POST['series'];        
	
		require '../db-connect.php';
	   
	   

//-----------------Sample Info Update Query------------
		$query_update = "UPDATE location_info SET loc_id='$loc_id', lat_dd=$lat_dd, long_dd=$long_dd, loc_acc=$loc_acc, map_unit='$map_unit', subgroup='$subgroup', series='$series' WHERE loc_id='$loc_id';";      

        $update_response = @mysqli_multi_query($dbc, $query_update);
        
        if($update_response){
			echo'
			<div class="container">
    			<div class="row justify-content-center">
					<div class="col-md-4">
						<h4><strong>Location Info</strong></h4>
						<table class="table table-secondary table-striped table-bordered table-sm">
							<tbody>
								<tr>
									<th>Location ID</th>
									<td>'.$loc_id.'</td>
								</tr>
								<tr>
									<th scope="row">Latitude (DD)</th>
									<td>'.$lat_dd.'</td>
								</tr>
								<tr>
									<th scope="row">Longitude (DD)</th>
									<td>'.$long_dd.'</td>
								</tr>
								<tr>
									<th scope="row">Location Accuracy (m)</th>
									<td>'.$loc_acc.'</td>
								</tr>
								<tr>
									<th scope="row">Soil Map Unit</th>
									<td>'.$map_unit.'</td>
								</tr>
								<tr>
									<th scope="row">Soil Subgroup</th>
									<td>'.$subgroup.'</td>
								</tr>
								<tr>
									<th scope="row">Soil Series</th>
									<td>'.$series.'</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
        	';
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
			<a href="update-location.php"><button class="btn btn-primary">Back</button></a>
		</div>
    </div>
</div>
</body>
</html>