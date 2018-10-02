<head><title>Delete Sample Data</title></head>
<?php
    include '../nav-template.php';  
    include("../functions/redirect_homepage.php");
    include("../functions/check-admin.php");
    require '../dbConnect.php';
    check_admin();
?>

<main role="main">
<div class="container">
    <div class="row justify-content-center" id="instruction" >
        <div class="col-6 text-center">
            <h1 class="display-4">Delete Sample</h1>
            <p class="lead my-4">Here is the sample data about to be deleted.</p>  
        </div> 
    </div>
    <hr class="mb-4">    
    <div class="row">
        <div class="col-md">
            <form action="sample-deleted.php" method="post"> 
            <?php
            if (isset($_POST['idanswer'])){
                $answer=$_POST['idanswer'];
                $query = "SELECT * FROM sample WHERE sample_id ='$answer'";
                $response = @mysqli_query($dbc,$query);
                if($response){
                    if(mysqli_num_rows($response)>0){
                        if ($row = mysqli_fetch_array($response)){                      
                            echo'
                            <input type="hidden" name="sample_id"  value="'.$answer.'" />';
                            
                            echo'
                            <p><strong>General Info</strong></p>
                            <table class="table table-secondary table-striped table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <th>Sample ID</th>
                                        <td>'.$answer.'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Site Number</th>
                                        <td>'.$row[1].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Field ID</th>
                                        <td>'.$row[2].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Site Type</th>
                                        <td>'.$row[3].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Year</th>
                                        <td>'.$row[4].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sample Number</th>
                                        <td>'.$row[5].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lab NO.</th>
                                        <td>'.$row[6].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Zone Number</th>
                                        <td>'.$row[7].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Shelf Number</th>
                                        <td>'.$row[8].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level in Shelf</th>
                                        <td>'.$row[9].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Row in Level</th>
                                        <td>'.$row[10].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Box in the Row</th>
                                        <td>'.$row[11].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level in Shelf</th>
                                        <td>'.$row[9].'</td>
                                    </tr>
                                </tbody>
                            </table>
        </div>
                    ';
                }}
            else{
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
        //---------------RECORDS EXIST-----------   
        
            if ($row_QueryPhy = mysqli_fetch_array($response2)){
 
            echo'
                <div class="col-md">
                <p><strong>Physical Info</strong></p>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Lab</th>
                            <td>'.$row_QueryPhy['LAB'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Location</th>
                            <td>'.$row_QueryPhy['LOCATION'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Depth</th>
                            <td>'.$row_QueryPhy['DEPTH'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Sand</th>
                            <td>'.$row_QueryPhy['SAND'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Clay</th>
                            <td>'.$row_QueryPhy['CLAY'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Silt</th>
                            <td>'.$row_QueryPhy['SILT'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Sand_VC</th>
                            <td>'.$row_QueryPhy['SAND_VC'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Sand_C</th>
                            <td>'.$row_QueryPhy['SAND_C'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Sand_M</th>
                            <td>'.$row_QueryPhy['SAND_M'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Sand_F</th>
                            <td>'.$row_QueryPhy['SAND_F'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Sand_VF</th>
                            <td>'.$row_QueryPhy['SAND_VF'].'</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                ';
        }}

        else
        {
            echo "ERROR: No entries found. Please check the value you entered.</br>
            You have entered Sample ID:<b> $answer</b></br>";
        }}

        else
        {
            echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
            //echo mysqli_error($dbc)."</br>";
        }
        
        
        $query3=" SELECT sample.sample_id,chemical.* FROM sample left JOIN chemical ON sample.sample_id=chemical.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
        $response3 = @mysqli_query($dbc,$query3);
        if($response3){
            if(mysqli_num_rows($response3)>0){  
        //------------------RECORDS EXIST-------------    
        
            if ($row_QueryChe = mysqli_fetch_array($response3)){
 
                echo'
                <div class="col-md">
                <p><strong>Chemical Info</strong></p>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>ORG_MTR</th>
                            <td>'.$row_QueryChe['ORG_MTR'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">CEC</th>
                            <td>'.$row_QueryChe['CEC'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">BUFFER_PH</th>
                            <td>'.$row_QueryChe['BUFFER_PH'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">PER_K</th>
                            <td>'.$row_QueryChe['PER_K'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">PER_MG</th>
                            <td>'.$row_QueryChe['PER_MG'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">PER_CA</th>
                            <td>'.$row_QueryChe['PER_CA'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">PER_NA</th>
                            <td>'.$row_QueryChe['PER_NA'].'</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                ';
                                                                                        
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
 
                echo'
                </div>
                <div class="row">
                <div class="col-sm-4">
                <p><strong>Soil-Biome Info</strong></p>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Biome01</th>
                            <td>'.$row_QueryBio['biome01'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Biome02</th>
                            <td>'.$row_QueryBio['biome02'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Biome03</th>
                            <td>'.$row_QueryBio['biome03'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Biome04</th>
                            <td>'.$row_QueryBio['biome04'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Biome05</th>
                            <td>'.$row_QueryBio['biome05'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Biome06</th>
                            <td>'.$row_QueryBio['biome06'].'</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                ';
                                                                                        
   }} 
   
   else{
       echo "ERROR: No entries found. Please check the value you entered.</br>
       You have entered Sample ID:<b> $answer</b></br>";
   }}
   
   else{
        echo "<table><tr><td>ERROR: No entries found. Please select a field</td></tr></table>";
        //echo mysqli_error($dbc)."</br>";
    }
        
        
    $query5=" SELECT sample.sample_id,spectral.* FROM sample left JOIN spectral ON sample.sample_id=spectral.SMPL_ID where sample.sample_id = '$answer' order by sample.sample_id";
    $response5 = @mysqli_query($dbc,$query5);
    if($response5){
        if(mysqli_num_rows($response5)>0){  
        //-----------------------RECORDS EXIST-------------------------------    
        
            if ($row_QuerySpectral = mysqli_fetch_array($response5)){
 
            echo'
                <div class="col-sm-4">
                <p><strong>Soil-Spectral Info</strong></p>
                <table class="table table-secondary table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Spectral01</th>
                            <td>'.$row_QuerySpectral['spectral01'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Spectral02</th>
                            <td>'.$row_QuerySpectral['spectral02'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Spectral03</th>
                            <td>'.$row_QuerySpectral['spectral03'].'</td>
                        </tr>
                    </tbody>
                </table>
                </div></div>
                ';

            
                                                                                        
   }} 
   
   else{
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
    </div>    
    <div id="updateNow" class="row justify-content-center">
        <div class="col-6 text-center">
            <input class="btn btn-danger mt-4" type="submit" name="updateNow" value="Delete Sample Data"/>
            <small class="form-text text-muted mb-5">Warning: this cannot be undone</small>  
        </div> 
    <div>    
   
</form> 
</div>
</body>   
<script>
     document.getElementById("defaultOpen").click();
</script>
</html>
