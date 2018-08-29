<!---
                            ******* SAVE FOR FURTHER REFERENCE PELASE************
                                this php ONLY search features in [sample] table
                    If ALL SAMPLE ID exist in ALL tables, please use [queryinfo_UNIOM.php]
--->

<html>
<head><title>Query Sample Result</title>
    <style> 
        
        html{
            overflow-x: scroll;
        }   
        
        
        #myButton{            
        background: #a9a033;
        padding:8px 13px;
        font-weight:600;
        font-family: Arial;
        font-size: 13pt;    
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
       
        <p class="big-2">click buttons to see details:</p>
    </div>
   
    
    
    <div class="page-main-content">
<?php 
    include '../functions/tab.php';
    require '../dbConnect.php';   
    $field = $_POST['field'];
    $answer = $_POST['answer'];
    
    
    
    $query = "SELECT * FROM sample WHERE $field = '$answer' order by sample_id";
    $response = @mysqli_query($dbc,$query);


    $query2="SELECT sample.sample_id,site_info.* FROM sample left JOIN site_info ON sample.site_num =site_info.site_num where sample.$field = '$answer' order by sample.sample_id";
    $response2 = @mysqli_query($dbc,$query2);
 
    
    
    $query3=" SELECT sample.sample_id,physical.* FROM sample left JOIN physical ON sample.sample_id=physical.SMPL_ID where sample.$field = '$answer' order by sample.sample_id";        
    $response3 = @mysqli_query($dbc,$query3);
    
    
    $query4=" SELECT sample.sample_id,chemical.* FROM sample left JOIN chemical ON sample.sample_id=chemical.SMPL_ID where sample.$field = '$answer' order by sample.sample_id";
    $response4 = @mysqli_query($dbc,$query4);
       
   $query5=" SELECT sample.sample_id,biome.* FROM sample left JOIN biome ON sample.sample_id=biome.SMPL_ID where sample.$field = '$answer' order by sample.sample_id";
    $response5 = @mysqli_query($dbc,$query5);
 
    $query6=" SELECT sample.sample_id,spectral.* FROM sample left JOIN spectral ON sample.sample_id=spectral.SMPL_ID where sample.$field = '$answer' order by sample.sample_id";
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
            var defaultText = "Search"
            };            
</script>
    
<script>
        document.getElementById("defaultOpen").click();

</script>

</html>

   
    
    
    


