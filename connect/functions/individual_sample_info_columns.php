<?php
/*---------------------------------------------------------------------------------------------------
this file is used to illustrate the informations of a single sample 
after it is updated or after that sample is added
---------------------------------------------------------------------------------------------------
files include this php file are:
    ../update/update3.php
    ../add/sample_added.php
-----------------------------------------------------------------------------------------------------*/
echo'
<div class="col-md">
    <p><strong>General Info</strong></p>
    <table class="table table-secondary table-striped table-bordered table-sm">
        <tbody>
            <tr>
                <th>Sample ID</th>
                <td>'.$sample_id.'</td>
            </tr>
            <tr>
                <th scope="row">Site Number</th>
                <td>'.$site_num.'</td>
            </tr>
            <tr>
                <th scope="row">Field ID</th>
                <td>'.$field_id.'</td>
            </tr>
            <tr>
                <th scope="row">Site Type</th>
                <td>'.$site_type.'</td>
            </tr>
            <tr>
                <th scope="row">Year</th>
                <td>'.$year.'</td>
            </tr>
            <tr>
                <th scope="row">Sample Number</th>
                <td>'.$sample_num.'</td>
            </tr>
            <tr>
                <th scope="row">Lab NO.</th>
                <td>'.$lab_num.'</td>
            </tr>
            <tr>
                <th scope="row">Zone Number</th>
                <td>'.$zone.'</td>
            </tr>
            <tr>
                <th scope="row">Shelf Number</th>
                <td>'.$shelf.'</td>
            </tr>
            <tr>
                <th scope="row">Level in Shelf</th>
                <td>'.$level.'</td>
            </tr>
            <tr>
                <th scope="row">Row in Level</th>
                <td>'.$rowrow.'</td>
            </tr>
            <tr>
                <th scope="row">Box in the Row</th>
                <td>'.$box.'</td>
            </tr>
        </tbody>
    </table>
</div>';


echo'
<div class="col-md">
<p><strong>Physical Info</strong></p>
<table class="table table-secondary table-striped table-bordered table-sm">
    <tbody>
        <tr>
            <th>Lab</th>
            <td>'.$LAB.'</td>
        </tr>
        <tr>
            <th scope="row">Location</th>
            <td>'.$LOCATION.'</td>
        </tr>
        <tr>
            <th scope="row">Depth</th>
            <td>'.$DEPTH.'</td>
        </tr>
        <tr>
            <th scope="row">Sand</th>
            <td>'.$SAND.'</td>
        </tr>
        <tr>
            <th scope="row">Clay</th>
            <td>'.$CLAY.'</td>
        </tr>
        <tr>
            <th scope="row">Silt</th>
            <td>'.$SILT.'</td>
        </tr>
        <tr>
            <th scope="row">Sand_VC</th>
            <td>'.$SAND_VC.'</td>
        </tr>
        <tr>
            <th scope="row">Sand_C</th>
            <td>'.$SAND_C.'</td>
        </tr>
        <tr>
            <th scope="row">Sand_M</th>
            <td>'.$SAND_M.'</td>
        </tr>
        <tr>
            <th scope="row">Sand_F</th>
            <td>'.$SAND_F.'</td>
        </tr>
        <tr>
            <th scope="row">Sand_VF</th>
            <td>'.$SAND_VF.'</td>
        </tr>
    </tbody>
</table>
</div>
';

echo'
<div class="col-md">
<p><strong>Chemical Info</strong></p>
<table class="table table-secondary table-striped table-bordered table-sm">
    <tbody>
        <tr>
            <th>ORG_MTR</th>
            <td>'.$ORG_MTR.'</td>
        </tr>
        <tr>
            <th scope="row">CEC</th>
            <td>'.$CEC.'</td>
        </tr>
        <tr>
            <th scope="row">BUFFER_PH</th>
            <td>'.$BUFFER_PH.'</td>
        </tr>
        <tr>
            <th scope="row">PER_K</th>
            <td>'.$PER_K.'</td>
        </tr>
        <tr>
            <th scope="row">PER_MG</th>
            <td>'.$PER_MG.'</td>
        </tr>
        <tr>
            <th scope="row">PER_CA</th>
            <td>'.$PER_CA.'</td>
        </tr>
        <tr>
            <th scope="row">PER_NA</th>
            <td>'.$PER_NA.'</td>
        </tr>
    </tbody>
</table>
</div>
</div>
';

echo'
<div class="row">
<div class="col-sm-4">
<p><strong>Soil-Biome Info</strong></p>
<table class="table table-secondary table-striped table-bordered table-sm">
    <tbody>
        <tr>
            <th>Biome01</th>
            <td>'.$biome01.'</td>
        </tr>
        <tr>
            <th scope="row">Biome02</th>
            <td>'.$biome02.'</td>
        </tr>
        <tr>
            <th scope="row">Biome03</th>
            <td>'.$biome03.'</td>
        </tr>
        <tr>
            <th scope="row">Biome04</th>
            <td>'.$biome04.'</td>
        </tr>
        <tr>
            <th scope="row">Biome05</th>
            <td>'.$biome05.'</td>
        </tr>
        <tr>
            <th scope="row">Biome06</th>
            <td>'.$biome06.'</td>
        </tr>
    </tbody>
</table>
</div>
'; 

echo'
<div class="col-sm-4">
<p><strong>Soil-Spectral Info</strong></p>
<table class="table table-secondary table-striped table-bordered table-sm">
    <tbody>
        <tr>
            <th>Spectral01</th>
            <td>'.$spectral01.'</td>
        </tr>
        <tr>
            <th scope="row">Spectral02</th>
            <td>'.$spectral02.'</td>
        </tr>
        <tr>
            <th scope="row">Spectral03</th>
            <td>'.$spectral03.'</td>
        </tr>
    </tbody>
</table>
</div></div>
';

?>