<head><title>Update Sample</title></head>
<?php include '../index.php'; ?>


<div class="container">
    <div class="row mb-5">
        <div class="col">
            <h1 class="display-4 text-center">Update Sample</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <p class="text-muted pb-2">To update a sample, search by Sample ID below</p>
            <form action="update2.php" method="post"> 
                <div id="create-label-query" class="form-group">
                    <label for="sampleID">Sample ID</label>  
                    <input required class="form-control" type="text" name="idanswer" placeholder="Enter Sample ID">
                </div>
                <input type="submit" class="btn btn-primary" value="Find Sample"/>
            </form>
        </div>
    </div>
</div>    

 
</body>
</html>