<!-----------------------------------------------------------------------------
This file create the printable label in the html
To edite the components on the printable label, edit the content below
-------------------------------------------------------------------------------
files include this php file are:
../label/individualLabel.php
../add/sample_added.php
../update/update3.php
--------------------------------------------------------------------------------->
<div class="with-label-clms Label" id="labelPrint">
    <p align="center"><strong>Soil Sample System</strong></p>
   
    <?php
    if(isset($row['lab_num'])){
    //---------if the label is created from (../label/individualLabel.php)
        echo'<p>Lab NO.: '.$row['lab_num'].'</p>';
        echo'
        <p>Storage: '.$row['zone'].'-'.$row['shelf'].'-'.$row['level'].'-'.$row['row'].'-'.$row['box']. '</p>';
        echo'
        <p>Zone: '.$row['zone'].'     Shelf: '.$row['shelf'].'     Level: '.$row['level'].'     Row: '.$row['row'].'     Box: '.$row['box'].'</p>';          
        echo $img;
        mysqli_close($dbc);        
    }else{
    //---------if the label is created from (../add/sample_added.php) or (../update/update3.php)
        echo'<p>Lab NO.: '.$lab_num.'</p>';
        echo'<p>Storage: '.$zone.'-'.$shelf.'-'.$level.'-'.$rowrow.'-'.$box. '</p>';
        echo'<p>Zone: '.$zone.'     Shelf: '.$shelf.'     Level: '.$level.'     Row: '.$rowrow.'     Box: '.$box.'</p>';
         $img = "<img src=\"https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".$lab_num."&choe=UTF-8\" title=\""."Lab Number"."\" />";  
        echo $img;
}
?>
    <p >Contact: Xiaoyuan Geng | xiaoyuan.geng@agr.gc.ca</p>
        
</div>