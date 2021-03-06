<head><title>Add Sample</title></head>
<?php 
include '../nav-template.php'; 
include '../functions/check-admin.php';
check_admin();
require '../db-connect.php'; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">Add New Sample</h1>
            <hr class="mb-4">
        </div>
    </div>
</div>
<div class="container">
<form action="sample-added.php" method="post">
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
                                '<select class="form-control" name="proj_id" required >
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
                            <input class="form-control"  type="number" name="year" value="" placeholder="YYYY" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="date">Date</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="date" name="date" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="province">Province</label>
                        <div class="col-sm-7">
                            <select class="form-control" required name="province">
                                <option value="" hidden>Please Select</option>
                                <?php $provinces = array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT"); ?>
                                <?php foreach($provinces as $province){ ?>
                                <option value="<?php echo $province;?>"><?php echo $province;?></option>
                                <?php } ?>
                            </select>      
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="u_depth">Upper Depth</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" name="u_depth" placeholder="Centimetres" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label pr-0" for="l_depth">Lower Depth</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" name="l_depth" placeholder="Centimetres" required />
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
                        <label class="col-sm-4 col-form-label" for="t_gravel">Total Gravel</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="number" step="any" name="t_gravel" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="t_clay">Total Clay</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="number" step="any" name="t_clay" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="t_silt">Total Silt</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="number" step="any" name="t_silt" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="t_sand">Total Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="number" step="any" name="t_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="vc_sand">Very Coarse Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="number" step="any" name="vc_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="c_sand">Coarse Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="number" step="any" name="c_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="m_sand">Medium Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="number" step="any" name="m_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="f_sand">Fine Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="number" step="any" name="f_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="vf_sand">Very Fine Sand</label>
                        <div class="col-sm-7">
                            <input class="form-control"  type="number" step="any" name="vf_sand" placeholder="%"/>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-sm-4 col-form-label" for="u_depth_bd">Upper Depth (Bulk Density)</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" name="u_depth_bd" placeholder="cm"/>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-sm-4 col-form-label" for="l_depth_bd">Lower Depth (Bulk Density)</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" name="l_depth_bd" placeholder="cm"/>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-sm-4 col-form-label" for="bulkd">Bulk Density</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" step="any" name="bulkd" placeholder="g/cm&sup3"/>
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
                <!-- Archive -->
                <div class="col-md-6 mt-5 px-5">
                    <div class="row justify-content-center mb-5">
                        <h4 class="d-inline mr-2">Archive</h4>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="arch_year">Archive Year</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" name="arch_year" placeholder="YYYY" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="section">Section</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="section" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="column">Column</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" name="column" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="row">Row</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" name="row" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="box_id">Box ID</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" name="box_id" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="weight">Weight</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" name="weight" placeholder="g"/>
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
                    <input class="form-control" type="number" step="any" name="ph_cacl2"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="ph_h2o">pH (H<sub>2</sub>O)</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="ph_h2o"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="ttl_c">Total C</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="ttl_c" placeholder="%"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="ttl_n">Total N</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="ttl_n" placeholder="%"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="caco3">CaCO<sub>3</sub></label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="caco3" placeholder="%"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="org_c">org_c</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="org_c"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="org_c_n">org_c_n</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="org_c_n"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="tec">Total Exchangable Cations</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="tec" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="cec">Cation Exchange Capacity</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="cec" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="al_exch">Exchangable Al</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="al_exch" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="ca_exch">Exchangable Ca</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="ca_exch" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="mg_exch">Exchangable Mg</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="mg_exch" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="k_exch">Exchangable K</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="k_exch" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="exch_na">Exchangable Na</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="na_exch" placeholder="meq/100g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="avail_k">Available K</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="avail_k" placeholder="&#xb5;g/g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="avail_pbi">Available P (NaHCO<sub>3</sub>)</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="avail_pbi" placeholder="&#xb5;g/g"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="avail_pbr">Available P (Bray)</label>
                <div class="col-sm-7">
                    <input class="form-control" type="number" step="any" name="avail_pbr" placeholder="&#xb5;g/g"/>
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