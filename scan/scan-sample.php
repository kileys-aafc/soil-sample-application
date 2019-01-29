<head><title>Scan Label</title></head>
<?php include '../nav-template.php';?>
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1 class="display-4 text-center">Scan Label</h1>
        </div>
    </div>
    <div class='row justify-content-center mb-4'>
        <p class="text-muted">To query sample data, scan QR code</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">            
            <form action="scan-results" method="post"> 
                <div id="create-label-query" class="form-group">
                    <label for="sample-id">Sample ID</label>  
                    <input required class="form-control" type="text" name="sample-id-value" placeholder="Enter Sample ID" autofocus>
                </div>
                <input type="submit" name="submit-sample-id" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>        
</body>
</html>