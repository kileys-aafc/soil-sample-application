<?php echo'
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4><strong>Sample Info</strong></h4>
            <table class="table table-secondary table-striped table-bordered table-sm">
                <tbody>
                <tr>
                    <th>Sample ID</th>
                    <td>'.$sample_id.'</td>
                </tr>
                <tr>
                    <th scope="row">Location ID</th>
                    <td>'.$loc_id.'</td>
                </tr>
                <tr>
                    <th scope="row">Project ID</th>
                    <td>'.$proj_id.'</td>
                </tr>
                <tr>
                    <th scope="row">Year</th>
                    <td>'.$year.'</td>
                </tr>
                <tr>
                    <th scope="row">Date</th>
                    <td>'.$date.'</td>
                </tr>
                <tr>
                    <th scope="row">Province</th>
                    <td>'.$province.'</td>
                </tr>
                <tr>
                    <th scope="row">Upper Depth</th>
                    <td>'.$u_depth.'</td>
                </tr>
                <tr>
                    <th scope="row">Lower Depth</th>
                    <td>'.$l_depth.'</td>
                </tr>
                <tr>
                    <th scope="row">Horizon</th>
                    <td>'.$horizon.'</td>
                </tr>
                <tr>
                    <th scope="row">Original ID</th>
                    <td>'.$orig_id.'</td>
                </tr>
                <tr>
                    <th scope="row">Notes</th>
                    <td>'.$notes.'</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h4><strong>Physical</strong></h4>
            <table class="table table-secondary table-striped table-bordered table-sm">
                <tbody>
                    <tr>
                        <th>Sample ID</th>
                        <td>'.$sample_id.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Bulk Density</th>
                        <td>'.$bulkd.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Gravel %</th>
                        <td>'.$t_gravel.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Clay %</th>
                        <td>'.$t_clay.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Silt %</th>
                        <td>'.$t_silt.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Sand %</th>
                        <td>'.$t_sand.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Very Coarse Sand</th>
                        <td>'.$vc_sand.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Coarse Sand</th>
                        <td>'.$c_sand.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Medium Sand</th>
                        <td>'.$m_sand.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Fine Sand</th>
                        <td>'.$f_sand.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Very Fine Sand</th>
                        <td>'.$vf_sand.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Soil texture</th>
                        <td>'.$texture.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Field Soil Texture</th>
                        <td>'.$field_txt.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h4><strong>Chemical</strong></h4>
            <table class="table table-secondary table-striped table-bordered table-sm">
                <tbody>
                    <tr>
                        <th>Sample ID</th>
                        <td>'.$sample_id.'</td>
                    </tr>
                    <tr>
                        <th scope="row">pH (CaCl<sub>2</sub>)</th>
                        <td>'.$ph_cacl2.'</td>
                    </tr>
                    <tr>
                        <th scope="row">pH (H<sub>2</sub>O)</th>
                        <td>'.$ph_h2o.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Carbon %</th>
                        <td>'.$ttl_c.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Nitrogen %</th>
                        <td>'.$ttl_n.'</td>
                    </tr>
                    <tr>
                        <th scope="row">CaCO<sub>3</sub></th>
                        <td>'.$caco3.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Organic Carbon %</th>
                        <td>'.$org_c.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Organic Carbon (Non-Calcareous)</th>
                        <td>'.$org_c_n.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Exchangable Cations</th>
                        <td>'.$tec.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Cation Exchange Capacity</th>
                        <td>'.$cec.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Exchangable Ca</th>
                        <td>'.$ca_exch.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Exchangable Mg</th>
                        <td>'.$mg_exch.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Exchangable K</th>
                        <td>'.$k_exch.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Exchangable Na</th>
                        <td>'.$na_exch.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Available P (&#xb5;g/g); NaHCO<sub>3</sub> extractable</th>
                        <td>'.$avail_pbi.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Available P (&#xb5;/g); Bray Method</th>
                        <td>'.$avail_pbr.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h4><strong>Archive Jar #1</strong></h4>
            <table class="table table-secondary table-striped table-bordered table-sm">
                <tbody>
                    <tr>
                        <th>Sample ID</th>
                        <td>'.$sample_id.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Jar Number</th>
                        <td>'.$jar_1.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Year Archived</th>
                        <td>'.$arch_year_jar_1.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Section</th>
                        <td>'.$section_jar_1.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Column</th>
                        <td>'.$column_jar_1.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Row</th>
                        <td>'.$row_jar_1.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Box ID</th>
                        <td>'.$box_id_jar_1.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
';
if($jar_2_required == "yes"){
    echo '
        <div class="col-md-4">
            <h4><strong>Archive Jar #2</strong></h4>
            <table class="table table-secondary table-striped table-bordered table-sm">
                <tbody>
                    <tr>
                        <th>Sample ID</th>
                        <td>'.$sample_id.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Jar Number</th>
                        <td>'.$jar_2.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Year Archived</th>
                        <td>'.$arch_year_jar_2.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Section</th>
                        <td>'.$section_jar_2.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Column</th>
                        <td>'.$column_jar_2.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Row</th>
                        <td>'.$row_jar_2.'</td>
                    </tr>
                    <tr>
                        <th scope="row">Box ID</th>
                        <td>'.$box_id_jar_2.'</td>
                    </tr>
                </tbody>
            </table>
        </div>';
}

echo'
    </div>
</div>';


?>