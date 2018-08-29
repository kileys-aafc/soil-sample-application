
    <?php
    include '../index.php'; 
    ?>
<html>

    
<head>    
    <title>Query Sample Info</title>
    <style>
    
    #query_selection{
        padding-top: 15px;
        padding-left: 50px;
        line-height: 2.5;    
    }
    
    select[name=field]{
         height:28pt;
        width:250px;
    }

    input[type = submit]{
        padding:7px 18px;
         float: right;
        background: #a9a033;
        border-radius: 4px;
        border: 2pt solid #a9a633; 
        color:#373d38;
        margin: 10px; 
        height: 28pt;
    }
    
</style>
    
</head>
    
    
<body>
     <div class="page-subtitle">
        <p class="big-2" style="width:100%;"><b>Query Sample Info</b></p>
        <p class="big-2" style="width:100%;"><small><i>To query samples, select a field to start</i></small></p>
    </div>
    <div class="page-main-content">
        
        <?php
            include '../functions/tab.php';
        ?>



        <div id="tabNum1" class="tabcontent">
                <form action = "queryinfo_sample.php" method = "post">
                <div id="query_selection">
                 <table border = "0">

                <tr>

                    <td>Select General Info to Query:</td>
                    <td>                    
                    <select name = "field">
                    <!here the name is used as a variable in next php page_>
                        <option value = "">-Please Select-</option>
                        <option value = "sample_id">Sample ID(assigned)</option>
                        <option value = "site_num">Site Number</option>
                        <option value = "field_id">Field ID</option>
                        <option value = "site_type">Site Type</option>
                        <option value = "sample_num">Sample Number</option>
                        <option value = "lab_num">Lab Number</option>
                        <option value = "zone">Zone of Storage</option>    
                    </select>
                    </td>
                </tr> 

                <tr>
                    <td>Where field matches (exact):</td>  
                    <td align="center"><input required type = "text" name = "answer" size = "30" /></td>
                </tr>    

                <tr>
                    <td colspan="2" align="center"><input type = "submit" value = "Submit"/></td>
                    <!colspan ------ width of the button__>
                    <!value is the texting showing on the button___>
                </tr>

                </table>   
                </div>        
                </form>
            </div>


        <div id="tabNum2" class="tabcontent">
            <form action = "queryinfoSite.php" method = "post">
             <div id="query_selection">
                 <table border = "0">       
                    <tr>
                        <td>Select Site Info to Query:</td>
                        <td>
                            <select name = "field">       
                            <option value = "">-Please Select-</option>
                            <option value = "site_num">Site NO.</option>
                            <option value = "site_prov">Site Province</option>                 
                            </select>
                        </td>
                    </tr> 

                    <tr>
                        <td>Where field matches (exact):</td>  
                        <td align="center"><input required type = "text" name = "answer" size = "30" /></td>
                    </tr>    

                    <tr>
                        <td colspan="2" align="center"><input type = "submit" value = "Submit"/></td>
                    </tr>
                 </table>   
            </div>
            </form>   
        </div>


        <div id="tabNum3" class="tabcontent">
            <form action = "queryinfoPhysical.php" method = "post">
             <div id="query_selection">
                 <table border = "0">       
                    <tr>
                        <td>Select Physical Info to Query:</td>
                        <td>
                            <select name = "field">
                            <!here the name is used as a variable in next php page_>
                            <option value = "">-Please Select-</option>
                            <option value = "LAB">LAB</option>
                            <option value = "SMPL_ID">Sample ID(assigned)</option>
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
                        </td>
                    </tr> 

                    <tr>
                            <td>Where field matches (exact):</td>  
                            <td align="center"><input required type = "text" name = "answer" size = "30" /></td>
                    </tr>       

                    <tr>
                        <td colspan="2" align="center"><input type = "submit" value = "Submit"/></td>
                    </tr>
                </table>   
            </div>        
            </form>    
        </div>


        <div id="tabNum4" class="tabcontent">
            <form action = "queryinfoChemical.php" method = "post">
             <div id="query_selection">
                 <table border = "0">       
                    <tr>
                    <td>Select Physical Info to Query:</td>
                    <td>
                        <select name = "field">
                        <!here the name is used as a variable in next php page_>
                        <option value = "">-Please Select-</option>
                        <option value = "ORG_MTR">ORG_MTR</option>
                        <option value = "CEC">CEC</option>
                        <option value = "BUFFER_PH">BUFFER_PH</option>
                        <option value = "PER_K">PER_K</option>                 
                        <option value = "PER_MG">PER_MG</option>                 
                        <option value = "PER_CA">PER_CA</option>                 
                        <option value = "PER_NA">PER_NA</option>                 
                        </select>
                    </td>
                    </tr> 

                    <tr>
                        <td>Where field matches (exact):</td>  
                        <td align="center"><input required type = "text" name = "answer" size = "30" /></td>
                    </tr>    

                    <tr>
                        <td colspan="2" align="center"><input type = "submit" value = "Submit"/></td>
                    </tr>
             </table>   
            </div> 
            </form>   
        </div>


        <div id="tabNum5" class="tabcontent">
            <form action = "queryinfoBiome.php" method = "post">
             <div id="query_selection">
                 <table border = "0">       
                    <tr>
                    <td>Select Soil Biome Info to Query:</td>
                        <td>
                            <select name = "field">
                                <!here the name is used as a variable in next php page_>
                                <option value = "">-Please Select-</option>
                                <option value = "biome01">biome01</option>
                                <option value = "biome02">biome02</option>
                                <option value = "biome03">biome03</option>
                                <option value = "biome04">biome04</option>
                                <option value = "biome05">biome05</option>
                                <option value = "biome06">biome06</option>
                            </select>
                        </td>
                    </tr> 

                    <tr>
                    <td>Where field matches (exact):</td>  
                    <td align="center"><input required type = "text" name = "answer" size = "30" /></td>
                    </tr>    

                    <tr>
                        <td colspan="2" align="center"><input type = "submit" value = "Submit"/></td>
                    </tr>
                </table>   
            </div>        
            </form>   
        </div>


        <div id="tabNum6" class="tabcontent">
    <form action = "queryinfoSpectral.php" method = "post">
    <div id="query_selection">
         <table border = "0">       
            <tr>
            <td>Select Soil Spectral Info to Query:</td>
                <td>
                    <select name = "field">
                        <!here the name is used as a variable in next php page_>
                        <option value = "">-Please Select-</option>
                        <option value = "spectral01">spectral01</option>
                        <option value = "spectral02">spectral02</option>
                        <option value = "spectral03">spectral03</option>
                    </select>
                </td>
            </tr> 

            <tr>
            <td>Where field matches (exact):</td>  
            <td align="center"><input required type = "text" name = "answer" size = "30" /></td>
            </tr>    

            <tr>
                <td colspan="2" align="center"><input type = "submit" value = "Submit"/></td>
            </tr>
        </table>   
    </div>        
    </form>   
</div>
    </div>
</body>
    
    
<script>
     document.getElementById("defaultOpen").click();
</script>
</html>
