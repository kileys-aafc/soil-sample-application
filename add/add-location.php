<head><title>Add Location</title></head>
<?php 
include '../nav-template.php'; 
include '../functions/check-admin.php';
check_admin();
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Add New Location</h1>
            <hr class="mb-4">
        </div>
    </div>    
</div>
<div class="container">
    <form action="location-added.php" method="post">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-3">
            <h4 class="text-center mb-4">Location Info</h4>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label" for="loc_id">Location ID</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="loc_id" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label" for="lat_dd">Latitude</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="lat_dd" placeholder="decimal degrees" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label" for="long_dd">Longitude</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="long_dd" placeholder="decimal degrees" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label" for="loc_acc">Location Accuracy</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="loc_acc" placeholder="metres" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label" for="map_unit">Soil Map Unit</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="map_unit"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label" for="subgroup">Soil Subgroup</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="subgroup"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label" for="series">Soil Series</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="series"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <!-- Submit -->
        <div class="text-center my-3" name="submit">
            <input class="btn btn-primary" type="submit" name="add-location" value="Add Location" />
        </div>
    </div>
    </form>
</div>
</body>
</html>