<head><title>Add Sample</title></head>
<?php include '../nav-template.php'; 
require '../db-connect.php'; ?>

<div class="container">
    <h1 class="display-4 text-center mb-5">Add New Sample</h1>
    <hr class="mb-4">
</div>
<div class="container">
<form class="justify content center" action="sample-added.php" method="post">
    <div class="justify-content-center">
    <div class="row">
        
        <div class="col-md-8">
            <div class="row">
        
                <!-- Sample Info -->
                <div class="col-md-6">
                    <h4 class="text-center mb-4">Sample Info</h4>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="sample_id">Sample ID</label>
                        <div class="col-sm-7">
                            <input class="form-control" required type="text" name="sample_id"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="loc_id">Location ID</label>
                        <div class="col-sm-7">    
                        <?php
                            
                            $query_loc_id = "SELECT loc_id FROM location_info";
                            $get_loc_id = @mysqli_query($dbc, $query_loc_id);

                            echo
                                '<select class="form-control" name="loc_id" required>
                                <option value="" hidden> Please Select</option>';
                            
                            while($row_loc_id = mysqli_fetch_assoc($get_loc_id))
                            {      
                                echo '<option value='.$row_loc_id["loc_id"].'>'.$row_loc_id["loc_id"].'</option>';
                            }
                            echo"</select>";
                        ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="proj_id">Project ID</label>
                        <div class="col-sm-7">
                            <?php
                            
                            $query_proj_id = "SELECT proj_id FROM projects";
                            $get_proj_id = @mysqli_query($dbc, $query_proj_id);

                            echo
                                '<select class="form-control" name=proj_id" required >
                                <option value="" hidden>Please Select</option>';
                            
                            while($row_proj_id = mysqli_fetch_assoc($get_proj_id))
                            {      
                                echo '<option value='.$row_proj_id["proj_id"].'>'.$row_proj_id["proj_id"].'</option>';
                            }
                            echo"</select>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="year">Year</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="year" value="" placeholder="YYYY" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="date">Date</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="date" name="date" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="prov">Province</label>
                        <div class="col-sm-7">
                            <select class="form-control" required name="prov">
                                <option value="" hidden>Please Select</option>
                                <?php $provinces = array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT"); ?>
                                <?php foreach($provinces as $prov){ ?>
                                <option value="<?php echo $prov;?>"><?php echo $prov;?></option>
                                <?php } ?>
                            </select>      
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="u_depth">Upper Depth</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="u_depth" placeholder="Centimetres" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="l_depth">Lower Depth</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="l_depth" placeholder="Centimetres" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="horizon">Horizon</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="horizon" placeholder=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="orig_id">Original ID</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="orig_id" placeholder=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="notes">Notes</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="notes" placeholder=""/>
                        </div>
                    </div>
                </div>

                <!--  Physical Info  -->
                <div class="col-md-6">
                    <h4 class="text-center mb-4">Physical</h4>
                    <div class="form-group row">                    
                        <label class="col-sm-4 col-form-label" for="bulkd">Bulk Density</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="bulkd" placeholder="g/cm&sup3"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="t_gravel">Total Gravel</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="t_gravel" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="t_clay">Total Clay</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="t_clay" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="t_silt">Total Silt</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="t_silt" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="t_sand">Total Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="t_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="vc_sand">Very Coarse Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="vc_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="c_sand">Coarse Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="c_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="m_sand">Medium Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="m_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="f_sand">Fine Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="f_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="vf_sand">Very Fine Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="text" name="vf_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="texture">Texture</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="texture"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="field_txt">Field Texture</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="field_txt"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Archive 1 -->
                <div class="col-md-6 mt-5 px-5">
                    <div class="row justify-content-center mb-5">
                        <h4 class="d-inline mr-2">Archive</h4>
                        <h4 class="d-inline text-muted">(Jar #1)</h4>
                    </div>
                    <div class="form-group row mt-">
                        <label class="col-sm-5 col-form-label" for="jar_1">Jar #</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="jar_1" value="1" readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="arch_year_jar_1">Archive Year</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="arch_year_jar_1" placeholder="YYYY" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="section_jar_1">Section</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="section_jar_1" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="column_jar_1">Column</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="column_jar_1" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="row_jar_1">Row</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="row_jar_1" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="box_id_jar_1">Box ID</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="box_id_jar_1" required/>
                        </div>
                    </div>
                </div>

                <!-- Archive 2 -->                            
                <div class="col-md-6 mt-5 px-5">
                    <div class="row justify-content-center">
                        <h4 class="d-inline mr-2">Archive</h4>
                        <h4 class="d-inline text-muted">(Jar #2)</h4>
                    </div>
                    <p class="small text-center mb-4">(If required)</p>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="jar_2">Jar #</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="arch_year_jar_2" value="2" readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="arch_year_jar_2">Archive Year</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="arch_year_jar_2"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="section_jar_2">Section</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="section_jar_2"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="column_jar_2">Column</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="column_jar_2"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="row_jar_2">Row</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="row_jar_2"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="box_id_jar_2">Box ID</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="box_id_jar_2"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>                  

        <!-- Chemical Info  -->
        <div class="col-md-4">
            <h4 class="text-center mb-4">Chemical Info</h4>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="ph_cacl2">pH (CaCl<sub>2</sub>)</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="ORG_MTR"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="ph_h2o">pH (H<sub>2</sub>O)</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="ph_h2o"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="ttl_c">Total C</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="ttl_c" placeholder="%"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="ttl_n">Total N</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="ttl_n" placeholder="%"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="caco3">CaCO<sub>3</sub></label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="caco3" placeholder="%"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="org_c">org_c</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="org_c"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="org_c_n">org_c_n</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="org_c_n"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="tec">Total Exchangable Cations</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="tec" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="cec">Cation Exchange Capacity</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="cec" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="exch_ca">Exchangable Ca</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="exch_ca" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="exch_mg">Exchangable Mg</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="exch_mg" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="exch_k">Exchangable K</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="exch_k" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="exch_na">Exchangable Na</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="exch_na" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="avail_pbi">Available P (NaHCO<sub>3</sub>)</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="avail_pbi" placeholder="μg/g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="avail_pbr">Available P (Bray)</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" name="avail_pbr" placeholder="μg/g"/>
                </div>
            </div>
        </div>
    </div>          

        <!-- Submit -->
        <div class="text-center my-5" name="submit">
            <input class="btn btn-primary" type="submit" name="add-sample" value="Add New Sample" />
        </div>
</form>
</div>
</body>
</html>