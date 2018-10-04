<!---
                            ******* SAVE FOR FURTHER REFERENCE PELASE************
                        this php ONLY search based on features in [physical] table
                    If ALL SAMPLE ID exist in ALL tables, please use [queryinfo_UNIOM.php]
--->

<html>
    <?php
      include '../nav-template.php';  
    ?>
<head>
    <title>Query Sample Result</title>
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
require '../dbConnect.php'; 
$field = $_POST['field'];
$answer = $_POST['answer'];
    
    $query = "SELECT spectral.SMPL_ID,sample.* FROM spectral left JOIN sample ON spectral.SMPL_ID = sample.sample_id where   spectral.$field='$answer' order by SMPL_ID";
    $response = @mysqli_query($dbc,$query);
    

    $query2="select sample.sample_id ,site_info.* from spectral, site_info ,sample where spectral.$field = '$answer' and sample.sample_id=spectral.SMPL_ID and  sample.site_num=site_info.site_num order by sample.sample_id";
    $response2 = @mysqli_query($dbc,$query2);

   $query3="SELECT spectral.SMPL_ID,physical.* FROM spectral left JOIN physical ON physical.SMPL_ID = spectral.SMPL_ID where   spectral.$field='$answer' order by spectral.SMPL_ID";
    $response3 = @mysqli_query($dbc,$query3);

    $query4=" SELECT spectral.SMPL_ID,chemical.* FROM spectral left JOIN chemical ON spectral.SMPL_ID = chemical.SMPL_ID where   spectral.$field='$answer' order by spectral.SMPL_ID";
    $response4 = @mysqli_query($dbc,$query4);

   $query5="SELECT spectral.SMPL_ID,biome.* FROM spectral left JOIN biome ON spectral.SMPL_ID = biome.SMPL_ID where   spectral.$field='$answer' order by spectral.SMPL_ID";
    $response5 = @mysqli_query($dbc,$query5);

    $query6=" SELECT * FROM  spectral  where $field = '$answer'  order by spectral.SMPL_ID";
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
                                location.href="http://localhost/soil/connect/query/querySample.php";
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

   
    
    
    


