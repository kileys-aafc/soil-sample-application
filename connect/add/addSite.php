<html>
<?php
 include '../index.php';  ?>
 <head><title>Add a New Site</title></head>   

<body>
    <div id = "add-site">
    
    <p class="big-2"><strong>Add a New Site</strong></p>  
   
  
    
    
        <form action="siteAdded.php"    method="post">
            <table >
                <col width="300px">
                <col width="100px">
                <col width="100px">
                <col width="100px">
                <tr>
                    <td>Site Number:</td>
                    <td colspan="3"> <input required type ="text" name="site_num"  maxlength="2" value = "" /></td>
                </tr>

                <tr>
                    <td>Site Province:</td>
                    <td colspan="3"> <input required type ="text" name="site_prov" maxlength="2" value = "" /></td>
                </tr>

                <tr>
                    <td>Site Name:</td>
                    <td colspan="3"> <input required type ="text" name="site_name"  value = "" /></td>
                </tr>

                  <tr>
                    <td>Site Latitude [N]</td>
                    <td><input  type ="text"  name="lat_d" maxlength="2"  value = "" placeholder="degree" /> </td>
                    <td><input  type ="text"  name="lat_m" maxlength="2"  value = "" placeholder="minute" /> </td>
                    <td><input  type ="text"  name="lat_s" maxlength="2"  value = "" placeholder="second" /> </td>
                </tr>

                <tr>
                    <td>Site Longitude [W]</td>
                    <td><input  type ="text"  name="lon_d" maxlength="2"  value = "" placeholder="degree" /> </td>
                    <td><input  type ="text"  name="lon_m" maxlength="2"  value = "" placeholder="minute" /> </td>
                    <td><input  type ="text"  name="lon_s" maxlength="3"  value = "" placeholder="second" /> </td>
                </tr>

                <tr>
                    <td>Site Size (in ha):</td>
                    <td colspan="3"> <input required type ="text" name="size_ha" maxlength="50" value = "" /></td>
                </tr>

                <tr>
                    <td>Year Established(YYYY):</td>
                    <td colspan="3"> <select required name="year_establish" style="width:100%; height:28pt;">
                    <option value="">-Please Select-</option>
                <?php

                for ($i=2000;$i>=1980;$i--){
                    ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php
                }
                ?>
                    </select></td>
                </tr>

                <tr>
                    <td>Ecological Setting:</td>
                    <td colspan="3"><input required type ="text" name="ecol_setting" maxlength="50" value = "" /> 
                </tr>


            </table> 

            <p style="width:600px;">
                <input type = "submit" value = "Add this New Site"/>
            </p>
            
        </form>
        
        
</div>
</body>
<style>
   

  
    input[type = text]{
        height:28pt;
        width: 100%;
    }

    td{
       
        padding: 3px 2px;
    }
    
    table{
        font-size: 13pt;
    }
    #add-site{
        padding-left: 50px;
        line-height: 2.5; 
        width: 60%;
        float: left;
        margin-left: 50px;
  
    }
    

   
</style>
</html>