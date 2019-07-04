<head><title>Search Database</title></head>
<?php include '../nav-template.php';
require '../db-connect.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Search Database</h1>
            <p class="text-center text-muted py-2">To search the database, enter search parameters below</p>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
	<form action="" method="post">
        <div class="form-row">
            <div class="form-group col">
                <label for="select_proj">Project</label>
                <?php               
                $query_proj_id = "SELECT proj_id FROM projects";
                $get_proj_id = @mysqli_query($dbc, $query_proj_id);

                echo
                    '<select class="form-control" name="proj_id">
                    <option value="">All</option>';
                
                while($row_proj_id = mysqli_fetch_assoc($get_proj_id))
                {      
                    echo '<option value='.$row_proj_id["proj_id"].'>'.$row_proj_id["proj_id"].'</option>';
                }
                echo"</select>";
                ?>
            </div>
            <div class="form-group col">
            <label for="select_province">Province</label>
                <select class="form-control" id="select_province" name="province">
					<option value="">All</option>
					<?php $provinces = array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT"); ?>
					<?php foreach($provinces as $province){ ?>
					<option value="<?php echo $province;?>"><?php echo $province;?></option>
					<?php } ?>
				</select>      
            </div>
			<div class="form-group col">
				<label for="select_loc_id">Location ID</label>
					<?php

					$query_loc_id = "SELECT loc_id FROM location_info";
					$get_loc_id = @mysqli_query($dbc, $query_loc_id);

					echo
						'<select class="form-control" name="loc_id">
						<option value="">All</option>';
					
					while($row_loc_id = mysqli_fetch_assoc($get_loc_id))
					{      
						echo '<option value='.$row_loc_id["loc_id"].'>'.$row_loc_id["loc_id"].'</option>';
					}
					echo"</select>";
					?>
			</div>
            <div class="form-group col">
                <label for="input_sample_id">Sample ID</label>
                <input type="text" name="sample_id_value" id="input_sample_id" placeholder="All (input to filter)" class="form-control"/>
            </div>
			<div class="form-group col">
                <label for="input_year">Year (YYYY)</label>
                <input type="text" name="year_value" id="input_sample_id" placeholder="All (input to filter)" class="form-control"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col text-center mt-3">
                <button name="submit-query" type="submit" class="btn btn-success">Query</button>
                <a href="../download/sample-query.xlsx" class="btn btn-primary <?php if(!isset($_POST['submit-query'])) echo "collapse"; ?>">Download .xlsx</a>
            </div>
            
        </div>        
    </form>
</div>

<div id="query-sample-results" class="container mb-5">                
	<?php include 'query-samples.php'?>
</div>    


<!-- Script to collapse any opened buttons -->
<script>
    jQuery('button').click( function(e) {
    jQuery('.collapse').collapse('hide');
    });
</script>

<!-- Script to collapse results buttons -->
<script>
function hideResults() {
    var x = document.getElementById("query-sample-results");
    {
        x.style.display = "none";
    }
}
</script>
</body>
</html>
