<head><title>Add a New Site</title></head> 
<?php include '../index.php'; ?>

<div class="container" id="add-site">
    <h1 class="display-4 text-center mb-4">Add a New Site</h1>
    <div class="row justify-content-center">
        <div class="col-sm-5 mt-4">
            <form action="siteAdded.php" method="post">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="site_num">Site Number</label>
                    <div class="col-sm-8">
                        <input class="form-control" required type="text" name="site_num"  maxlength="2" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="site_prov">Site Province</label>
                    <div class="col-sm-8"> 
                        <input class="form-control" required type="text" name="site_prov" maxlength="2" value = "" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="site_name">Site Name</label>
                    <div class="col-sm-8">
                        <input class="form-control" required type ="text" name="site_name"  value = "" />
                    </div>
                </div>
                <div class="form-group row no-gutters">
                    <label class="col-sm-4 col-form-label mr-2" for="lat">Site Latitude</label>
                    <div class="col-sm">
                        <input  class=" form-control form-control-sm" required id="lat" type="text"  name="lat_d" maxlength="2"  value="" placeholder="Degrees" />
                    </div>
                    <div class="col-sm">
                        <input  class="form-control form-control-sm" required type="text"  name="lat_m" maxlength="2"  value="" placeholder="Minutes" />
                    </div>
                    <div class="col-sm">
                        <input  class="form-control form-control-sm" required type="text"  name="lat_s" maxlength="2"  value="" placeholder="Seconds" />
                    </div>
                </div>
                <div class="form-group row row no-gutters">
                    <label class="col-sm-4 col-form-label mr-2" for="long">Site Longitude</label>
                    <div class="col-sm">
                        <input  class="form-control form-control-sm" required id="long" type="text"  name="lon_d" maxlength="2"  value="" placeholder="Degrees" />
                    </div>
                    <div class="col-sm">
                        <input  class="form-control form-control-sm" required type ="text"  name="lon_m" maxlength="2"  value = "" placeholder="Minutes" />
                    </div>
                    <div class="col-sm">
                        <input  class="form-control form-control-sm" required type ="text"  name="lon_s" maxlength="3"  value = "" placeholder="Seconds" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="size_ha">Site Size (ha)</label>
                    <div class="col-sm">
                        <input class="form-control" type="text" name="size_ha" maxlength="50" value = "" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="year_established">Year Established</label>
                    <div class="col-sm">
                        <select class="form-control" required name="year_established">
                            <option value="" placeholder="Please Select" hidden></option>
                                <?php

                                for ($i=2000;$i>=1980;$i--){
                                    ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="ecol_setting">Ecological Setting</label>
                    <div class="col-sm">
                        <input class="form-control" type="text" name="ecol_setting" maxlength="50" value = "" />
                    </div>
                </div>
                <div class="text-center"> 
                    <input class="btn btn-primary" type="submit" value="Add New Site"/>
                </div>
            </form>
        
        
</div>
</body>
</html>