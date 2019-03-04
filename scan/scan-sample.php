<head><title>Scan Sample</title></head>
<?php include '../nav-template.php';?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Scan Sample</h1>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
    <p class="text-muted text-center pb-2">To query sample data, scan sample QR code</p>
    <form action="scan-results" method="post">
    <div class="row justify-content-center">
        <div class="col-4">            
            <div id="create-label-query" class="form-group">
                <input required class="form-control" type="text" name="sample-id-value" placeholder="Enter Sample ID" autofocus>
            </div>
            <input type="submit" name="submit-sample-id" class="btn btn-primary">
        </div>
    </div>
    </form>
</div>        
</body>
</html>