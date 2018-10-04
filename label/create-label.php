<head><title>Create Labels</title></head>
<?php include '../nav-template.php';?>
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <h1 class="display-4 text-center">Print Sample Labels</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <p class="text-muted pb-2">To print labels, first search a sample to print</p>
            <form action="" method="post"> 
                <div id="create-label-query" class="form-group">
                    <label for="sampleID">Sample ID</label>  
                    <input required class="form-control" type="text" name="sampleID" placeholder="Enter Sample ID">
                </div>
                <input type="submit" class="btn btn-primary" data-toggle="collapse" data-target="#labelResults"  aria-expanded="false" aria-controls="labelResults">
            </form>
        </div>
    </div>
</div>        

<div id="labelResults" class="container ">                
    <?php include 'label-data.php'?>
</div>

</body>
</html>