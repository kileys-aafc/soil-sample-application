<head><title>Project Updated</title></head>
<?php include '../nav-template.php'; ?>

<main role="main">       
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-6 text-center">
            <h1 class="display-4">Project Updated</h1>
            <p class="lead my-4">Here is the updated project data.</p>  
        </div> 
    </div>
    <div class="row">
    	<hr class="mb-4">
	</div>
</div>   
	<?php        
        if(isset($_POST['update-project'])){
		//------Project info from $_POST[] --------
		$proj_id = $_POST['proj_id'];
		$proj_name = $_POST['proj_name'];        
	
		require '../db-connect.php';
	   
	   

//-----------------Sample Info Update Query------------
		$query_update = "UPDATE projects SET proj_id='$proj_id', proj_name='$proj_name' WHERE proj_id='$proj_id';";      

        $update_response = @mysqli_multi_query($dbc, $query_update);
        
        if($update_response){
			echo'
			<div class="container">
    			<div class="row justify-content-center">
					<div class="col-md-4">
						<h4><strong>Project Info</strong></h4>
						<table class="table table-secondary table-striped table-bordered table-sm">
							<tbody>
								<tr>
									<th>Project ID</th>
									<td>'.$proj_id.'</td>
								</tr>
								<tr>
									<th scope="row">Project Name</th>
									<td>'.$proj_name.'</td>
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
			<a href="update-project.php"><button class="btn btn-primary">Back</button></a>
		</div>
    </div>
</div>
</body>
</html>