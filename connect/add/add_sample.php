<!-----------------------------------------------------------------------------------------
This file is the webpage that require users to enter the new sample information
------------------------------------------------------------------------------------------>
<html>
<?php
 include '../index.php';  
?>
 <head><title>Add Sample</title></head>   

<body>
    
    <div  class="page-subtitle">
       <!--- <p class="big-1">Add a New Sample</p>--->
        <p class="big-2"><b>Add a New Sample</b></p>
        <p class="big-2"><small><i>Click tab buttons and fill in all blanks.</i></small></p>
    </div>
   
    <div class="page-main-content">
     <?php  include '../functions/tab.php';?>
    <form action="sample_added.php"    method="post">
    <!-----------------------------Tab 1, type in general info of new sample------------------------------------->
    <div id="tabNum1" class="tabcontent">
        <div class="fourtyfive left">
        <p>Sample ID:
        <input required type ="text" name="sample_id"  value = "" />
        </p>
    
        <p>Site Number:        
        <?php
        require '../dbConnect.php';   
        $queryAdd_SiteNum= "SELECT site_num FROM site_info";
        $get_addSiteNum=@mysqli_query($dbc,$queryAdd_SiteNum);

        echo"<select  required name='site_num' style='width:200px;'>
            <option value=''>-Please Select-</option>";        
            while($row_addSiteNum=mysqli_fetch_assoc($get_addSiteNum)){      
            echo"<option value=".$row_addSiteNum['site_num'].">".$row_addSiteNum['site_num']."</option>";
            }
        echo"</select>";
           ?>   
        </p>

        <p>field ID:
        <input required type ="text" name="field_id"  value = "" />
        </p>    

        <p>Site Type:
        <input required type ="text" name="site_type"   value = "" />
        </p>

        <p>Year(YYYY):
           <select  required name="year" style='width:200px;'>
                <option value="">-Please Select-</option>
                <?php

                for ($i=2000;$i>=1980;$i--){
                    ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php
                }
                ?>
            </select>
        </p>

        <p>Sample Number:
        <input required type="text" name="sample_num"   value="" />
        </p>     
        </div>
        
        <div class="fourtyfive right">

        <p>Lab Number:
        <input required type="text" name="lab_num"   value="" />
        </p>

        <p>Zone Number:
        <select  required name="zone"  style='width:200px;' >
                <option value="">-Please Select-</option>
            <?php

            for ($i=1;$i<=3;$i++){
                ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php
            }
            ?>
                </select>
        </p>

        <p>Shelf Number:
            <select  required name="shelf"  style='width:200px;'>
                <option value="">-Please Select-</option>
            <?php

            for ($i=1;$i<=20;$i++){
                ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php
            }
            ?>
                </select>    
        </p>

        <p>Level in Shelf:
        <select  required name="level"  style='width:200px;'>
                <option value="">-Please Select-</option>
            <?php

            for ($i=1;$i<=10;$i++){
                ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php
            }
            ?>
                </select>
        </p>

        <p>Row in Level:
            <select  required name="row" style='width:200px;'>
                <option value="">-Please Select-</option>
            <?php

            for ($i=1;$i<=5;$i++){
                ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php
            }
            ?>
            </select>
        </p>

        <p>Box in the Row:
            <select  required name="box" style='width:200px;'>
                <option value="">-Please Select-</option>
                <?php

                for ($i=1;$i<=5;$i++){
                    ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php
                }
                ?>
            </select>
        </p>
        </div>
    </div>
      
    <div id="tabNum2" class="tabcontent">
        <div class="fourtyfive">
            <p style="width:100%;">
                The site information is automatically filled with the "site number" chosen under the general info section.
            </p>
            <p style="width:100%;">
                If your desired site number is not shown on the dropdown menu, please go to "Sample management" &#8594; "Add Site" to add the new site.
            </p>
        </div>
        </div>
    <!-----------------------------Tab 2, physical------------------------------------->
    
    <div id="tabNum3" class="tabcontent">   
        <div class="fourtyfive left">
        <p>LAB:
            <input required type="text" name="LAB_Phy" size="30"/>
        </p>
        <p>Location:
            <input required type="text" name="LOCATION" size="30"/>
        </p>
        <p>Depth:
            <input required type="text" name="DEPTH" size="30"/>
        </p>
        <p>Sand:
            <input required type="text" name="SAND" size="30"/>
        </p>
        <p>Clay:
            <input required type="text" name="CLAY" size="30"/>
        </p>
        <p>Silt:
            <input required type="text" name="SILT" size="30"/>
        </p>
        </div>
        <div class="fourtyfive right">
        <p>Sand_VC:
            <input required type="text" name="SAND_VC" size="30"/>
        </p>
        <p>Sand_C:
            <input required type="text" name="SAND_C" size="30"/>
        </p>
        <p>Sand_M:
            <input required type="text" name="SAND_M" size="30"/>
        </p>
        <p>Sand_F:
            <input required type="text" name="SAND_F" size="30"/>
        </p>
        <p>Sand_VF:
            <input required type="text" name="SAND_VF" size="30"/>
        </p>
        </div>
    </div>
    
    <!-----------------------------Tab3, chemical------------------------------------->
    
    <div id="tabNum4" class="tabcontent">
        <div class="fourtyfive left">
            <p>ORG_MTR:
            <input required type ="text" name="ORG_MTR"  value = "" />
            </p>
            <p>CEC:
            <input required type ="text" name="CEC"  value = "" />
            </p>
            <p>BUFFER_PH:
            <input required type ="text" name="BUFFER_PH"  value = "" />
            </p>
        </div>
        
        <div class="fourtyfive right">
            <p>PER_K:
            <input required type ="text" name="PER_K"  value = "" />
            </p>
            <p>PER_MG:
            <input required type ="text" name="PER_MG"  value = "" />
            </p>
            <p>PER_CA:
            <input required type ="text" name="PER_CA"  value = "" />
            </p>
            <p>PER_NA:
            <input required type ="text" name="PER_NA"  value = "" />
            </p>
        </div>
        
        
    </div>
    <!-----------------------------Tab 4, Soil Bio------------------------------------->
    
    <div id="tabNum5" class="tabcontent">
        <div class="fourtyfive left">
            <p>Siol-Bio 01:
            <input required type ="text" name="biome01"  value = "" />
            </p>  
            <p>Siol-Bio 02:
            <input required type ="text" name="biome02"  value = "" />
            </p>
            <p>Siol-Bio 03:
            <input required type ="text" name="biome03"  value = "" />
            </p>
        </div>

        <div class="fourtyfive right">
            <p>Siol-Bio 04:
            <input required type ="text" name="biome04"  value = "" />
            </p>
            <p>Siol-Bio 05:
            <input required type ="text" name="biome05"  value = "" />
            </p>        
            <p>Siol-Bio 06:
            <input required type ="text" name="biome06"  value = "" />
            </p>
        </div>
    </div>
    <!-----------------------------Tab 5, Soil Spectral------------------------------------->
    
    <div id="tabNum6" class="tabcontent">
        <div class="fourtyfive left">
            <p>Soil-Spectral 01:
            <input required type ="text" name="spectral01"  value = "" />
            </p>
            <p>Soil-Spectral 02:
            <input required type ="text" name="spectral02"  value = "" />
            </p>
            <p>Soil-Spectral 03:
            <input required type ="text" name="spectral03"  value = "" />
            </p>
        </div>
    </div>
    
    
    <!----------------------------submit ----------------------------------------------->
    <div name="submit">
        <p>
            <input type = "submit" name = "submitAdd" value = "Send" />
        </p>  
    </div>
        
</form>
</div>   
    <div class="page-bottom-notes">
    
        <p class="big-2"><small ><i>Check all input box under each tab before submit.</i></small></p>
    </div>
    
    
</body>
    

<style>
     .page-bottom-notes{
        font-size: 12px;
        width: 90%;
        float: center;
        margin: auto auto 10px auto;
    }
    
    p{
        width: 500px;
        text-align: left;
        padding-left: 100px;
    }
    
    
    input[type = text]{
        height:28pt;
        width:200px;
        float: right;
    }
    
    select{
        height:28pt;
        float: right;
    }
    
    input[type = submit]{       
        padding:7px 18px;
        background: #a9a033;
        border-radius: 4px;
        border: 2pt solid #a9a633; 
        width: 300px;
    }
    
    .left{
        width:50%;
        text-align: center;
    }
    
    .right{
        width:50%;
        text-align: center;
}
    
</style>
    
<script>
     document.getElementById("defaultOpen").click();
</script>
    
</html>