<!---
                            ******* SAVE FOR FURTHER REFERENCE PELASE************
                        this php ONLY search based on features in [biome] table
                    If ALL SAMPLE ID exist in ALL tables, please use [queryinfo_UNIOM.php]
--->

<html>
    <?php
  include '../nav-template.php';  
?>
<head><title>Query Sample Result</title>
    <style> 
   
        #myButton{            
        background: #a9a033;
        padding:10px 24px;
        font-weight:600;
        font-family: Arial;
        font-size: 13pt;
        width:300px;
        border-radius: 12px;
        border: 2pt solid #a9a633; 
        color:#373d38;
        margin: 10px;                  
        }

   input[type = text]{
        width: 100%;  
    }
</style> 
   
</head>
<body>

    <div  class="page-subtitle">
        <p class="big-1">Query Result<button id = "myButton" style="float:right;">Start a New Query</button><br></p>
       
    </div>
     
      <div class="page-main-content">
    
  
<?php
include '../functions/tab.php';
require '../db-connect.php'; 
$field = $_POST['field'];
$answer = $_POST['answer'];
    
    $query = "SELECT biome.SMPL_ID,sample.* FROM biome left JOIN sample ON biome.SMPL_ID = sample.sample_id where   biome.$field='$answer' order by SMPL_ID";
    $response = @mysqli_query($dbc,$query);
    

    $query2="select sample.sample_id ,site_info.* from biome, site_info ,sample where biome.$field = '$answer' and sample.sample_id=biome.SMPL_ID and  sample.site_num=site_info.site_num order by sample.sample_id";
    $response2 = @mysqli_query($dbc,$query2);

   $query3="SELECT biome.SMPL_ID,physical.* FROM biome left JOIN physical ON physical.SMPL_ID = biome.SMPL_ID where   biome.$field='$answer' order by biome.SMPL_ID";
    $response3 = @mysqli_query($dbc,$query3);

    $query4=" SELECT biome.SMPL_ID,chemical.* FROM biome left JOIN chemical ON biome.SMPL_ID = chemical.SMPL_ID where   biome.$field='$answer' order by biome.SMPL_ID";
    $response4 = @mysqli_query($dbc,$query4);

   $query5=" SELECT  biome.* FROM  biome where biome.$field = '$answer'  order by biome.SMPL_ID";
    $response5 = @mysqli_query($dbc,$query5);

    $query6="SELECT biome.SMPL_ID,spectral.* FROM biome left JOIN spectral ON biome.SMPL_ID = spectral.SMPL_ID where   biome.$field='$answer' order by biome.SMPL_ID";
    $response6 = @mysqli_query($dbc,$query6);

    ///////////////////////////////////////////////////////////////////////////////////////////////////////
        //---------------------------call function to build table---------------------------------
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    include("../functions/build_query_table.php");
    build_query_table($response,$response2,$response3,$response4,$response5,$response6);
    mysqli_close($dbc);
?>
    </div>
    
</body>   
    
<script type="text/javascript">
        
        document.getElementById("myButton").onclick=function(){
            location.href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/soil/connect/query/querySample.php";
                                };
        var defaultText = "Search";
        var searchBox = document.getElementById("ssearch");
        searchBox.value = defaultText;
        searchBox.onfocus = function(){
            if (this.value==defaultText){
                this.value = '';
            }
        }                  
</script>  
<script>

    document.getElementById("defaultOpen").click();
</script>
</html>

   
    
    
    

