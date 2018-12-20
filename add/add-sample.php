<head><title>Add Sample</title></head>
<?php include '../nav-template.php'; ?>

<div class="container">
    <h1 class="display-4 text-center mb-5">Add a New Sample</h1>
    <hr class="mb-4">
    <div class="justify-content-center">
    <form class="justify content center" action="sample-added.php" method="post">
        <div class="row"> 
            <!----------General Info---------->
            <div class="col-sm-4 px-5">
                <h4 class="text-center mb-4">Sample Info</h4>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="sample_id">Sample ID</label>
                    <div class="col-sm-7">
                        <input class="form-control" required type="text" name="sample_id" value= "" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="site_num">Site Number</label>
                    <div class="col-sm-7">
                        <?php
                        require '../db-connect.php';   
                        $queryAdd_SiteNum= "SELECT site_num FROM site_info";
                        $get_addSiteNum=@mysqli_query($dbc,$queryAdd_SiteNum);

                        echo
                            '<select class="form-control" required name="site_num">
                                <option value="" hidden placeholder="Please Select"></option>';
                        
                        while($row_addSiteNum=mysqli_fetch_assoc($get_addSiteNum))
                        {      
                            echo '<option value='.$row_addSiteNum["site_num"].'>'.$row_addSiteNum["site_num"].'</option>';
                        }
                        echo"</select>";
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="field_id">Field ID</label>
                    <div class="col-sm-7">    
                        <input class= "form-control" required type="text" name="field_id" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="site_type">Site Type</label>
                    <div class="col-sm-7">
                        <input class="form-control"  type="text" name="site_type" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="year">Year</label>
                    <div class="col-sm-7">
                        <select class="form-control" required name="year">
                            <option value="" placeholder="Please Select" hidden></option>
                            <?php for ($i=2000;$i>=1980;$i--){ ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="sample_num">Sample Number</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="sample_num" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="sample_num">Lab Number</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="lab_num" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="zone">Zone Number</label>
                    <div class="col-sm-7">
                        <select class="form-control" required name="zone">
                            <option value="" placeholder="Please Select" hidden></option>
                            <?php for ($i=1;$i<=3;$i++){ ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="shelf">Shelf Number</label>
                    <div class="col-sm-7">
                        <select class="form-control" required name="shelf">
                            <option value="" placeholder="Please Select" hidden></option>
                            <?php for ($i=1;$i<=20;$i++){ ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="level">Level in Shelf</label>
                    <div class="col-sm-7">
                        <select class="form-control" required name="level">
                            <option value="" placeholder="Please Select" hidden></option>
                            <?php for ($i=1;$i<=10;$i++){ ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="level">Row in Level</label>
                    <div class="col-sm-7">
                        <select class="form-control" required name="row">
                            <option value="" placeholder="Please Select" hidden></option>
                            <?php for ($i=1;$i<=5;$i++){ ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label pr-0" for="box">Box in Row</label>
                    <div class="col-sm-7">
                        <select class="form-control" required name="box">
                            <option value="" placeholder="Please Select" hidden></option>
                            <?php for ($i=1;$i<=5;$i++){ ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <!--    Physical Info   -->
            <div class="col-sm-4 px-5">
            <h4 class="text-center mb-4">Physical Info</h4>
                <div class="form-group row">
                    
                    <label class="col-sm-4 col-form-label" for="LAB">LAB</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="LAB"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="LOCATION">Location</label>
                    <div class="col-sm-7">
                        <input class="form-control"  type="text" name="LOCATION"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="DEPTH">Depth</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="DEPTH"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="SAND">Sand</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="SAND"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="CLAY">Clay</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="CLAY"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="SILT">Silt</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="SILT"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="SAND_VC">Sand_VC</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="SAND_VC"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="SAND_C">Sand_C</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="SAND_C"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="SAND_M">Sand_M</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="SAND_M"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="SAND_F">Sand_F</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="SAND_F"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="SAND_VF">Sand_VF</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="SAND_VF"/>
                    </div>
                </div>
            </div>
            <!-- Chemical Info  -->
            <div class="col-sm-4 px-5">
            <h4 class="text-center mb-4">Chemical Info</h4>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="ORG_MTR">ORG_MTR</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="ORG_MTR"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="CEC">CEC</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="CEC"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="BUFFER_PH">BUFFER_PH</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="BUFFER_PH"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="PER_K">PER_K</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="PER_K"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="PER_MG">PER_MG</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="PER_MG"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="PER_CA">PER_CA</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="PER_CA"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="PER_NA">PER_NA</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="PER_NA"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--  Soil Bio -->
            <div class="col-sm-4 mt-5 px-5">
            <h4 class="text-center mb-4">Biology Info</h4>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="biome01">Soil-Bio 01</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="biome01"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="biome02">Soil-Bio 02</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="biome02"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="biome03">Soil-Bio 02</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="biome03"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="biome04">Soil-Bio 04</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="biome04"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="biome05">Soil-Bio 05</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="biome05"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="biome06">Soil-Bio 06</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="biome06"/>
                    </div>
                </div>
            </div>
            <!-- Soil Spectral -->
            <div class="col-sm-4 mt-5 px-5">
            <h4 class="text-center mb-4">Spectral Info</h4>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="spectral01">Spectral 01</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="spectral01"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="spectral02">Spectral 02</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="spectral02"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label" for="spectral03">Spectral 03</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="spectral03"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- Submit -->
        <div class="text-center mb-5" name="submit">
            <input class="btn btn-primary" type="submit" name="submitAdd" value="Add New Sample" />
        </div>
    </form>

    
    
</body>
</html>