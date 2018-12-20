<?php require '../db-connect.php';   

    if (isset($_POST['sampleID'])){
        echo '<div class="with-label-clms Info" id = "phpQuery">';
        $answer=$_POST['sampleID'];
        $query = "SELECT * FROM sample WHERE sample_id ='$answer'";
        $response = @mysqli_query($dbc,$query);
    if($response){
    
    if(mysqli_num_rows($response)>0){
    if ($row = mysqli_fetch_array($response)){                      
    echo'
    
    <hr class="mb-4">
    <div class="row justify-content-center">
        <div class="col-4">
            <table class="table table-secondary table-striped table-bordered table-sm">
                <tbody>
                    <tr>
                        <th>Sample ID</td>
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
        <div class="col-4 text-center">';
        $img = "<img src=\"https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=".$row['lab_num']."&choe=UTF-8\" title=\""."test"."\" />";      
            
        include("../functions/label.php");
    }}       

    else{
        echo    "ERROR: No entries found. Please check the value you entered.</br>
                You have entered Sample ID: <b>$answer</b> ";
        echo mysqli_error($dbc)."</br>";
    }}

    else{
        echo "There is something wrong with database connection. </br> 
              Please contact the administrator.</br>" ;
    }}
?>  

</div>     
</div>
   

