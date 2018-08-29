<!---
                            ******* SAVE FOR FURTHER REFERENCE PELASE************
                        this php ONLY search based on features in [physical] table
                    If ALL SAMPLE ID exist in ALL tables, please use [queryinfo_UNIOM.php]
--->

<html>
    
<head><title>Query Sample Result</title>
    <style> 
        
        html{
           
            overflow-x: scroll;
        }    
          
        #instruction{
            font-size: 13pt;
            padding: 10px 50px;
           
            
        }
      #querybuttons{
            width: 80%;
            margin: auto;     
        } 
      
        
        
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
<?php
  include '../index.php';  
?>
    <div  class="page-subtitle">
        <p class="big-1">Query Result<button id = "myButton" style="float:right;">Start a New Query</button><br></p>
       
    </div>
   
    
    
   
   
    
      <div class="page-main-content">
    
<?php
include '../functions/tab.php';
require '../dbConnect.php'; 
$field = $_POST['field'];
$answer = $_POST['answer'];
    $query="SELECT sample.*,site_info.$field FROM sample left JOIN site_info ON sample.site_num =site_info.site_num where site_info.$field = '$answer'";
    $response = @mysqli_query($dbc,$query);
    
    $query2="SELECT sample.sample_id,site_info.* FROM sample,site_info where sample.site_num =site_info.site_num and site_info.$field = '$answer'";
    $response2 = @mysqli_query($dbc,$query2);
    
    $query3="SELECT sample.sample_id, site_info.site_num,physical.* FROM site_info 
              left JOIN sample ON sample.site_num=site_info.site_num 
              left JOIN physical ON sample.sample_id=physical.SMPL_ID 
              where site_info.$field = '$answer'";
    $response3 = @mysqli_query($dbc,$query3);
    
    
    $query4="SELECT sample.sample_id, site_info.site_num,chemical.* FROM site_info 
              left JOIN sample ON sample.site_num=site_info.site_num 
              left JOIN chemical ON sample.sample_id=chemical.SMPL_ID 
              where site_info.$field = '$answer'";  
    $response4 = @mysqli_query($dbc,$query4);
       
   $query5="SELECT sample.sample_id, site_info.site_num,biome.* FROM site_info 
              left JOIN sample ON sample.site_num=site_info.site_num 
              left JOIN biome ON sample.sample_id=biome.SMPL_ID 
              where site_info.$field = '$answer'";  
    $response5 = @mysqli_query($dbc,$query5);
 
    $query6="SELECT sample.sample_id, site_info.site_num,spectral.* FROM site_info 
              left JOIN sample ON sample.site_num=site_info.site_num 
              left JOIN spectral ON sample.sample_id=spectral.SMPL_ID 
              where site_info.$field = '$answer'";   
    $response6 = @mysqli_query($dbc,$query6);
  
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
        //---------------------------call function to build table---------------------------------
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    include("../functions/build_query_table.php");
    build_query_table($response,$response2,$response3,$response4,$response5,$response6);
    mysqli_close($dbc);
?>
    </div>
    <div id="Q-Info-Site-des">
    <p>If the existing site does not show in result table, it is possible that there is no soil sample in that site.</p>
    <p><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/soil/connect/query/query_site.php"><u>Click here </u></a>to see more details about site info.</p>   
    </div>
</body>
    <script type="text/javascript">
        
        document.getElementById("myButton").onclick=function(){
            location.href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/soil/connect/query/querySample.php";
        };
    </script>
        
<script>
     document.getElementById("defaultOpen").click();
</script>
</html>


