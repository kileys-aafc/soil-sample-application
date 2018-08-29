
<html>
<?php
   include '../index.php';  
?>
<head><title>Update Data</title></head>
<style>
    
    #phpQuery{
        line-height: 1.5;
    }
    
    #labelPrint{
        background: #b9baaa;               
        border-radius: 30px;
    }
     
   
    .page-main-content:after{
        content: "";
        display: table;
        clear: both;
        
    }
  
    .info{
        padding:40px 500px 40px 40px;
        width: 65%;
      
    }
      button{            
        background: #a9a033;
        padding:10px 24px;
        font-weight:600;
        width:300px;
        border-radius: 12px;
        border: 2pt solid #a9a633; 
        color:#373d38;
        margin: 10px;
        }
   
</style>
<body>
    <div class="page-subtitle">
        <p class="big-1" style="width:100%;">Sample Label</p>
    </div>
    <div class="page-main-content">
    
 <?php
require '../dbConnect.php';   

    if (isset($_POST['idanswer'])){
        echo '<div class="with-label-clms Info" id = "phpQuery">';
        $answer=$_POST['idanswer'];
        $query = "SELECT * FROM sample WHERE sample_id ='$answer'";
        $response = @mysqli_query($dbc,$query);
    if($response){
    
    if(mysqli_num_rows($response)>0){
    if ($row = mysqli_fetch_array($response)){                      
    echo'
      
     
     
    You have entered Sample ID. <b>'.$answer.'</b></br>
    <b>General Info</b></br>
    <p class="align-left">Site Number: </p>  <p class="align-right">'.$row[1].'</p>  </br>   
    <p class="align-left">field ID:    </p>  <p class="align-right">'.$row[2].'</p>    </br>   
    <p class="align-left">Site Type:   </p>  <p class="align-right">'.$row[3].'</p>   </br>      
    <p class="align-left">Year:        </p>  <p class="align-right">'.$row[4].'</p>   </br>  
    <p class="align-left">Sample Number: </p>  <p class="align-right">'.$row[5].'</p>   </br>  
    <p class="align-left">Lab NO.:      </p>  <p class="align-right">'.$row[6].'</p>   </br>  
    <p class="align-left">Zone Number:  </p>  <p class="align-right">'.$row[7].'</p>   </br>  
    <p class="align-left">Shelf Number: </p>  <p class="align-right">'.$row[8].'</p>   </br>  
    <p class="align-left">Level in Shelf: </p>  <p class="align-right">'.$row[9].'</p>   </br>  
    <p class="align-left">Row in Level:   </p>  <p class="align-right">'.$row[10].'</p>   </br>  
    <p class="align-left">Box in the Row: </p>  <p class="align-right">'.$row[11].'</p>   </br>  ';
   $img = "<img src=\"https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".$row['lab_num']."&choe=UTF-8\" title=\""."test"."\" />   </br>  ";      
    echo '</div>';
        
        /*echo'<div class="with-label-clms Label" id="labelPrint">
            <p align="center"><strong>Soil Sample System</strong></p>
            ';
        echo'<p>Lab NO.: '.$row['lab_num'].'</p>';
        echo'<p>Storage: '.$row['zone'].'-'.$row['shelf'].'-'.$row['level'].'-'.$row['row'].'-'.$row['box']. '</p>';
        echo'<p>Zone: '.$row['zone'].'     Shelf: '.$row['shelf'].'     Level: '.$row['level'].'     Row: '.$row['row'].'     Box: '.$row['box'].'</p>';
          
        echo $img;
        mysqli_close($dbc); 
        echo '<p align="right">Contact: Xiaoyuan Geng | xiaoyuan.geng@agr.gc.ca</p> 
              </div>';*/
    include("../functions/label.php");
} 
        
}       
else{
        echo    "ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID: <b>$answer</b> ";
        echo mysqli_error($dbc)."</br>";
}
     
    }
    else{
        echo "There is something wrong with database connection. </br> 
              Please contact the administrator.</br>" ;
    }}
?>  
    
        <button onclick="history.go(-1);">Create another Sample Label</button>

     

   <!---</div> <div class="with-label-clms Label" id="labelPrint">
    <p align="center"><strong>Soil Sample System</strong></p>
    <?php
        echo'<p>Lab NO.: '.$row['lab_num'].'</p>';
        echo'<p>Storage: '.$row['zone'].'-'.$row['shelf'].'-'.$row['level'].'-'.$row['row'].'-'.$row['box']. '</p>';
        echo'<p>Zone: '.$row['zone'].'     Shelf: '.$row['shelf'].'     Level: '.$row['level'].'     Row: '.$row['row'].'     Box: '.$row['box'].'</p>';
          
        echo $img;
        mysqli_close($dbc);   
        ?>
        <p align="right">Contact: Xiaoyuan Geng | xiaoyuan.geng@agr.gc.ca</p>
        
    </div>--->
</div>     
   
</body>       
</html>
