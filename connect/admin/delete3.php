<html>
   
<?php
    include '../index.php';  
    include("../functions/redirect_homepage.php");
    include("../functions/check_admin.php");
    require '../dbConnect.php';
    check_admin();
?>
<head><title>Delete Sample Data</title></head>

<body>
    <div class="twoClm">        
    <div class="clm Info" id = "siteQuery">     
<?php   
        
        if (isset($_POST['updateNow'])){        
            $sample_id=$_POST['sample_id'];
     
             $queryDelete ="
            DELETE FROM sample WHERE sample_id='$sample_id'
            ;";
            
            $queryDelete .="
            DELETE FROM physical WHERE SMPL_ID='$sample_id'
            ;";
            
            $queryDelete .="
            DELETE FROM chemical WHERE SMPL_ID='$sample_id'
            ;";
            
            $queryDelete .="
            DELETE FROM biome WHERE SMPL_ID='$sample_id'
            ;";
            
            $queryDelete .="
            DELETE FROM spectral WHERE SMPL_ID='$sample_id'
            ;";
            
            
           $responseDelete = @mysqli_multi_query($dbc,$queryDelete);

            if($responseDelete){ 
                echo "Deleted</br>";
              }else{
                echo "RESPONSE SHOW DELETE FAIL</br>
                ERROR: Could not issue database query</br>";
                echo mysqli_error($dbc)."</br>";
                }            mysqli_close($dbc);  
        }
        else{
            redirect_homepage();
        }
?>  
        
     
        <button onclick="history.go(-2);" class="float-left submit-button">Start a New Updating</button>
   
    </div> 
     
    <!---
<div class="clm Label" id="labelPrint">
    <p align="center"><strong>Soil Sample System</strong></p>
    <?php
    
       echo'<p>Lab NO.: '.$lab_num.'</p>';
        echo'<p>Storage: '.$zone.'-'.$shelf.'-'.$level.'-'.$row.'-'.$box. '</p>';
        echo'<p>Zone: '.$zone.'     Shelf: '.$shelf.'     Level: '.$level.'     Row: '.$row.'     Box: '.$box.'</p>';
         $img = "<img src=\"https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".$lab_num."&choe=UTF-8\" title=\""."Lab Number"."\" />";  
        echo $img;
      
        ?>
        <p >Contact: Xiaoyuan Geng | xiaoyuan.geng@agr.gc.ca</p>
        
    </div>
    --->  
</div>
</body> 

    
    
    
<style>
   
    #phpQuery{
        padding-top: 30px;
        padding-left: 30px;
        
    }
     p{
        width:600;
        font-size: 13pt;
       
        
    }
   
    select[name=field]{
         height:28pt;
        
    }

    input[type = submit]{
        margin-top: 50px;
        padding:7px 18px;
         float: right;
    }
    
    
    .clm{
        float:left;
        padding:10px;
        height: 400px;
        
    }   
    
    .Info{
        width:30%;
    }
    
    .Label{
        width: 45%;
    }
    
    .twoClm:after{
       
        display: table;
        clear: both;
        
    }
    
    .twoClm{
        width: 80%;
        
        margin: 50px auto auto auto;
    }
    #labelPrint{
        
        background: #b9baaa;               
        border-radius: 30px;
    }
    
</style>   
</html>