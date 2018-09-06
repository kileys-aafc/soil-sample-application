<head><title>Query Samples</title></head>
<?php include '../index.php';?>
<main role="main" class="container">
    <div>
        <p class="h2 text-center font-weight-bold">Query Sample Database</p>
        <p class="text-center text-muted py-2" >To query samples, select a table to start</p>
    </div>
    <div class="row justify-content-center"> 
        <button class="btn btn-info mx-2" type="button" data-toggle="collapse" data-target="#sampleTable"  aria-expanded="false" aria-controls="sampleTable" onclick="hideResults()">Query Sample Table</button>
        <button class="btn btn-info mx-2" type="button" data-toggle="collapse" data-target="#siteTable"  aria-expanded="false" aria-controls="siteTable" onclick="hideResults()">Query Site Table</button> 
        <button class="btn btn-info mx-2" type="button" data-toggle="collapse" data-target="#physicalTable"  aria-expanded="false" aria-controls="physicalTable" onclick="hideResults()">Query Physical Table</button>
        <button class="btn btn-info mx-2" type="button" data-toggle="collapse" data-target="#chemicalTable"  aria-expanded="false" aria-controls="chemicalTable" onclick="hideResults()">Query Chemical Table</button>
        <button class="btn btn-info mx-2" type="button" data-toggle="collapse" data-target="#biomeTable"  aria-expanded="false" aria-controls="biomeTable" onclick="hideResults()">Query Biome Table</button>
        <button class="btn btn-info mx-2" type="button" data-toggle="collapse" data-target="#spectralTable"  aria-expanded="false" aria-controls="spectralTable" onclick="hideResults()">Query Spectral Table</button>
    </div>
    <hr class="mb-4">
    <div class="row justify-content-center align-items-center">
               
            <form id="sampleTable" action="" method="post"  class="collapse">
                <div class="form-group">
                    <label for="selectSample">Query Sample Table</label>
                    <select class="form-control" id="selectSample" name="field"><!-- here the name is used as a variable in next php page -->
                        <option hidden>Select Field</option>
                        <option value = "sample_id">Sample ID</option>
                        <option value = "site_num">Site Number</option>
                        <option value = "field_id">Field ID</option>
                        <option value = "site_type">Site Type</option>
                        <option value = "sample_num">Sample Number</option>
                        <option value = "lab_num">Lab Number</option>
                        <option value = "zone">Zone of Storage</option>    
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputSample">Where value is</label>  
                    <input required type="text" name="answer" id="inputSample"  placeholder="Exact value" class="form-control"/>
                </div>
                <button name="submitSample" type="submit" class="btn btn-success mb-2" data-toggle="collapse" data-target="#querySampleResults"  aria-expanded="false" aria-controls="SampleResults">Query</button>        
            </form>
           
                              
            <form id="siteTable" class="collapse" action="get_site_info.php" method="post">
                <div class="form-group">
                    <label for="selectSiteField">Query Site Table</label>
                    <select name="siteInfoField" class="form-control" id="selectSiteField">       
                        <option hidden>Select Field</option>
                        <option value = "site_num">Site Number</option>
                        <option value = "site_prov">Site Province</option>
                        <option value = "site_name">Site Name</option>
                        <option value = "all"> Show All Records</option>
                   </select>
                </div>          
                <div class="form-group">
                    <label for="inputSite">Where value is</label> 
                    <input type="text" name="siteQueryAnswer" id="inputSite" placeholder="Exact value" class="form-control"/>
                </div>
                <input type="submit" value="Query" class="btn btn-success mb-2"/>
            </form>
                   
        
        
            <form id="physicalTable" class="collapse" action="queryinfoPhysical.php" method="post">
                <div class="form-group">
                    <label for="selectPhysicalField">Query Physical Table</label>
                        <select name="field" id="selectPhysicalField" class="form-control">
                            <option hidden>Select Field</option>
                            <option value = "LAB">LAB</option>
                            <option value = "SMPL_ID">Sample ID</option>
                            <option value = "LOCATION">LOCATION</option>
                            <option value = "DEPTH">DEPTH</option>                 
                            <option value = "CLAY">Clay</option>                 
                            <option value = "SILT">Silt</option>                 
                            <option value = "SAND_VC">Sand VC</option>                 
                            <option value = "SAND_C">Sand C</option>                 
                            <option value = "SAND_M">Sand M</option>                 
                            <option value = "SAND_F">Sand F</option>                 
                            <option value = "SAND_VF">Sand VF</option>                 
                        </select>
                </div>        
                <div class="form-group">         
                    <label for="inputPhysical">Where value is</label>  
                        <input required type="text" name="answer" id="inputPhysical" placeholder="Exact value" class="form-control"/>
                </div>
                <input type="submit" value="Query" class="btn btn-success mb-2"/>
            </form>
                
              
            <form id="chemicalTable" class="collapse" action="queryinfoChemical.php" method="post">
                <div class="form-group">
                    <label for="selectChemicalField">Query Chemical Table</label>
                        <select name="field" id="selectChemicalField" class="form-control">
                            <option hidden>Select Field</option>
                            <option value = "ORG_MTR">ORG_MTR</option>
                            <option value = "CEC">CEC</option>
                            <option value = "BUFFER_PH">BUFFER_PH</option>
                            <option value = "PER_K">PER_K</option>                 
                            <option value = "PER_MG">PER_MG</option>                 
                            <option value = "PER_CA">PER_CA</option>                 
                            <option value = "PER_NA">PER_NA</option>                 
                        </select>
                </div>    
                <div class="form-group">
                    <label for="inputChemical">Where value is</label>  
                        <input required type="text" name="answer" id="inputChemical"  placeholder="Exact value" class="form-control"/>
                </div>
                <input type="submit" value="Query" class="btn btn-success mb-2"/>
            </form>   
                     
            
            <form id="biomeTable" class="collapse" action="queryinfoBiome.php" method="post">
                <div class="form-group">
                    <label for="selectBiomeField">Query Biome Table</label>
                        <select class="form-control" name="field" id="selectBiomeField">
                            <option hidden>Select Field</option>
                            <option value = "biome01">biome01</option>
                            <option value = "biome02">biome02</option>
                            <option value = "biome03">biome03</option>
                            <option value = "biome04">biome04</option>
                            <option value = "biome05">biome05</option>
                            <option value = "biome06">biome06</option>
                        </select>
                </div> 
                <div class=form-group>
                    <label for="selectBiomeField">Where value is</label>  
                        <input required type="text" name="answer" id="selectBiomeField" placeholder="Exact value" class="form-control"/>
                </div>
                <input type="submit" value="Query" class="btn btn-success mb-2"/>
            </form>
                
         
            <form id="spectralTable" class="collapse" action="queryinfoSpectral.php" method="post">
                <div class="form-group">
                    <label for="selectSpectralField">Query Spectral Table</label>
                        <select class="form-control" name="field" id="selectSpectralField" >
                            <option hidden>Select Field</option>
                            <option value = "spectral01">spectral01</option>
                            <option value = "spectral02">spectral02</option>
                            <option value = "spectral03">spectral03</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="inputSpectral">Where value is</label>
                    <input required type="text" name="answer" id="inputSpectral" placeholder="Exact value" class="form-control"/>
                </div>
                <input type="submit" value="Query" class="btn btn-success mb-2"/>
            </form>   
             
    </div>
    <div id="querySampleResults" class="container">                
        <?php include 'query_functions/query_sample_id.php'?>
    </div>    
    
</main>
</body>

<!-- Script to collapse any opened buttons -->
<script>
    jQuery('button').click( function(e) {
    jQuery('.collapse').collapse('hide');
    });
</script>

<!-- Script to collapse results buttons -->
<script>
function hideResults() {
    var x = document.getElementById("querySampleResults");
    {
        x.style.display = "none";
    }
}
</script>

</html>
