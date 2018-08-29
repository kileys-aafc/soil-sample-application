<html>
<?php
    include '../index.php';  
    include("../functions/redirect_homepage.php");
    include("../functions/check_admin.php");
    require '../dbConnect.php';
    check_admin();
?>
<head><title>Delete Sample Data</title></head>
<style>
    input[type = submit]{       
        padding:7px 18px;
      
        background: #a9a033;
        border-radius: 4px;
        border: 2pt solid #a9a633; 
        width: 300px;
       
    }
       
     .sub-col{float:left;
        padding:20px 15px;
        height: 400px;
        border: 2pt solid #a9a633; 
         line-height: 1.5;
        }
    
    .left01,.left02,.left03,.left04{
        width:18%;
        margin-right: 2%;
        }
    
</style>   
  
<body>
    
<div id="instruction" class="page-subtitle">
     <p class="big-1">Delete Sample</p>
    <p class="big-2">Here is the information about the sample to be deleted.</p>  
    </div> 
    
<div class="page-main-content">
    
    <form action = "delete3.php" method = "post"> 
<?php
     if (isset($_POST['idanswer'])){
        $answer=$_POST['idanswer'];
        $query = "SELECT * FROM sample WHERE sample_id ='$answer'";
        $response = @mysqli_query($dbc,$query);
        if($response){
            if(mysqli_num_rows($response)>0){
                if ($row = mysqli_fetch_array($response)){                      
                    echo'
                     <input type ="hidden" name="sample_id"  value = "'.$answer.'" />';
                    echo"
                    <div class='sub-col left01'>
                    <b>General Info</b></br>
                    <p class='align-left'>Sample ID: </p>    <p class='align-right'>".$answer."</p></br>
                    <p class='align-left'>Site Number: </p>  <p class='align-right'>".$row['site_num']."</p></br>
                    <p class='align-left'>Field ID:    </p>  <p class='align-right'>".$row['field_id']."</p></br>
                    <p class='align-left'>Site Type:   </p>  <p class='align-right'>".$row['site_type']."</p></br>
                    <p class='align-left'>Year:        </p>  <p class='align-right'>".$row['year']."</p></br>
                    <p class='align-left'>Sample Number: </p>  <p class='align-right'>".$row['sample_num']."</p></br>
                    <p class='align-left'>Zone number: </p>    <p class='align-right'>".$row['zone']."</p></br>
                    <p class='align-left'>Shelf Number; </p>   <p class='align-right'>".$row['shelf']."</p></br>
                    <p class='align-left'>Level in Shelf:</p>  <p class='align-right'>".$row['level']."</p></br>
                    <p class='align-left'>Row in Level: </p>   <p class='align-right'>".$row['row']."</p></br>
                    <p class='align-left'>Box in the Row: </p> <p class='align-right'>".$row['box']."</p></br>
                    </div>
                    ";
                }      
            }else{
                echo"
                ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID: <b>$answer</b> 
                ";
                echo mysqli_error($dbc)."</br>";
            }
        }
   


     $query2=" SELECT sample.sample_id,physical.* FROM sample left JOIN physical ON sample.sample_id=physical.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
     $response2 = @mysqli_query($dbc,$query2);
     if($response2){
         if(mysqli_num_rows($response2)>0){  
//-----------------------RECORDS EXIST-------------------------------    
        
            if ($row_QueryPhy = mysqli_fetch_array($response2)){
 
                echo"
                    <div class='sub-col left02'>
                    <b>Physical Info</b></br>

                    <p class='align-left'>LAB:</p>   <p class='align-right'>phy". $row_QueryPhy['LAB']."</p></br>
                    <p class='align-left'>Location:</p><p class='align-right'>". $row_QueryPhy['LOCATION']."</p></br>
                    <p class='align-left'>Depth:</p> <p class='align-right'>". $row_QueryPhy['DEPTH']."</p></br>
                    <p class='align-left'>Sand:</p>  <p class='align-right'>". $row_QueryPhy['SAND']."</p></br>
                    <p class='align-left'>Clay:</p>  <p class='align-right'>". $row_QueryPhy['CLAY']."</p></br>
                    <p class='align-left'>Silt:</p>  <p class='align-right'>". $row_QueryPhy['SILT']."</p></br>
                    <p class='align-left'>Sand_VC:</p><p class='align-right'>". $row_QueryPhy['SAND_VC']."</p></br>
                    <p class='align-left'>Sand_C:</p> <p class='align-right'>". $row_QueryPhy['SAND_C']."</p></br>
                    <p class='align-left'>Sand_M:</p> <p class='align-right'>". $row_QueryPhy['SAND_M']."</p></br>
                    <p class='align-left'>Sand_F:</p> <p class='align-right'>". $row_QueryPhy['SAND_F']."</p></br>
                    <p class='align-left'>Sand_VF:</p><p class='align-right'>". $row_QueryPhy['SAND_VF']."</p></br>
                    </div>";
                                                                                        
   }     
   } else{
       echo "ERROR: No entries found. Please check the value you entered.</br>
       You have entered Sample ID:<b> $answer</b></br>";
   }
}else{
    
    echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
    //echo mysqli_error($dbc)."</br>";
    }
        
        
     $query3=" SELECT sample.sample_id,chemical.* FROM sample left JOIN chemical ON sample.sample_id=chemical.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
     $response3 = @mysqli_query($dbc,$query3);
     if($response3){
         if(mysqli_num_rows($response3)>0){  
//-----------------------RECORDS EXIST-------------------------------    
        
            if ($row_QueryChe = mysqli_fetch_array($response3)){
 
                echo"
                <div class='sub-col left03'>
                 <b>Chemical Info</b></br>
                 <p class='align-left'>ORG_MTR:</p> <p class='align-right'>". $row_QueryChe['ORG_MTR']."</p></br>
                 <p class='align-left'>CEC:</p><p class='align-right'>". $row_QueryChe['CEC']."</p></br>
                 <p class='align-left'>BUFFER_PH:</p><p class='align-right'>". $row_QueryChe['BUFFER_PH']."</p></br>
                 <p class='align-left'>PER_K:</p><p class='align-right'>". $row_QueryChe['PER_K']."</p></br>
                 <p class='align-left'>PER_MG:</p><p class='align-right'>". $row_QueryChe['PER_MG']."</p></br>
                 <p class='align-left'>PER_CA:</p><p class='align-right'>". $row_QueryChe['PER_CA']."</p></br>
                 <p class='align-left'>PER_NA:</p><p class='align-right'>". $row_QueryChe['PER_NA']."</p></br>
                </div>
                ";
                                                                                        
   }     
   } else{
       echo "ERROR: No entries found. Please check the value you entered.</br>
       You have entered Sample ID:<b> $answer</b></br>";
   }
}else{
    
    echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
    //echo mysqli_error($dbc)."</br>";
    }
        
        
     $query4=" SELECT sample.sample_id,biome.* FROM sample left JOIN biome ON sample.sample_id=biome.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
     $response4 = @mysqli_query($dbc,$query4);
     if($response4){
         if(mysqli_num_rows($response4)>0){  
//-----------------------RECORDS EXIST-------------------------------    
        
            if ($row_QueryBio = mysqli_fetch_array($response4)){
 
                echo" 
                <div class='sub-col left04'>
                <b>Soil-Biome Info</b></br>
                 <p class='align-left'>Biome01:</p><p class='align-right'>". $row_QueryBio['biome01']."</p></br>
                 <p class='align-left'>Biome02:</p><p class='align-right'>". $row_QueryBio['biome02']."</p></br>
                 <p class='align-left'>Biome03:</p><p class='align-right'>". $row_QueryBio['biome03']."</p></br>
                 <p class='align-left'>Biome04:</p><p class='align-right'>". $row_QueryBio['biome04']."</p></br>
                 <p class='align-left'>Biome05:</p><p class='align-right'>". $row_QueryBio['biome05']."</p></br>
                 <p class='align-left'>Biome06:</p><p class='align-right'>". $row_QueryBio['biome06']."</p></br>
                </div>
                ";
                                                                                        
   }     
   } else{
       echo "ERROR: No entries found. Please check the value you entered.</br>
       You have entered Sample ID:<b> $answer</b></br>";
   }
}else{
    echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
    //echo mysqli_error($dbc)."</br>";
    }
        
        
     $query5=" SELECT sample.sample_id,spectral.* FROM sample left JOIN spectral ON sample.sample_id=spectral.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
     $response5 = @mysqli_query($dbc,$query5);
     if($response5){
         if(mysqli_num_rows($response5)>0){  
//-----------------------RECORDS EXIST-------------------------------    
        
            if ($row_QuerySpectral = mysqli_fetch_array($response5)){
 
                echo"
                <div class='sub-col left01'>
                <b>Soil-Spectral Info</b></br>
            <p class='align-left'>spectral01:</p><p class='align-right'>". $row_QuerySpectral['spectral01']."</p></br>
            <p class='align-left'>spectral02:</p><p class='align-right'>". $row_QuerySpectral['spectral02']."</p></br>
            <p class='align-left'>spectral03:</p><p class='align-right'>". $row_QuerySpectral['spectral03']."</p></br>
            </div>";
                                                                                        
   }     
   } else{
       echo "ERROR: No entries found. Please check the value you entered.</br>
       You have entered Sample ID:<b> $answer</b></br>";
   }
}else{
    echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
    //echo mysqli_error($dbc)."</br>";
    }
    mysqli_close($dbc);
     }
        else{
            redirect_homepage();
        }
?>
     
    <div id="updateNow">    
        <input type = "submit" name = "updateNow" value = "Yes, Delete this sample"/>  
    </div>
    

     
</form> 
 </div>
   <!---
<div id="newUpdate">
        <button onclick="history.go(-1);" >Search another Sample</button>
    </div>
--->
        
</body>   
<script>
     document.getElementById("defaultOpen").click();
</script>
</html>
