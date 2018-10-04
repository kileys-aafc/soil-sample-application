<!-----------------------------------------------------------------------------
This file create the printable label in the html
To edite the components on the printable label, edit the content below
-------------------------------------------------------------------------------
files include this php file are:
../label/individualLabel.php
../add/sample_added.php
../update/update3.php
--------------------------------------------------------------------------------->
<?php
    
    
    if(isset($row['lab_num'])){
    //---------if the label is created from (../label/individualLabel.php)
        echo '<p>Sample ID: <strong>'.$row['sample_id'].'</strong></p>';
        echo $img;    
        echo'<p>Zone: <strong>'.$row['zone'].' </strong></p>
             <p>Shelf: <strong>'.$row['shelf'].' </strong> Level: <strong>'.$row['level'].'</strong></p>
             <p>Row: <strong>'.$row['row'].' </strong> Box: <strong>'.$row['box'].'</strong></p>';          
        mysqli_close($dbc);        
    }

    else{
    //---------if the label is created from (../add/sample_added.php) or (../update/update3.php)
        
        echo '<p>'.$img.'</p>';
        echo'<p>Lab NO.: '.$lab_num.'</p>';
        echo'<p>Storage: '.$zone.'-'.$shelf.'-'.$level.'-'.$rowrow.'-'.$box. '</p>';
        echo'<p>Zone: '.$zone.'     Shelf: '.$shelf.'     Level: '.$level.'     Row: '.$rowrow.'     Box: '.$box.'</p>';
        $img = "<img src=\"https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".$lab_num."&choe=UTF-8\" title=\""."Lab Number"."\" />";
    }
?>
