<html>
<?php
 include '../index.php';  
?>
<head><title>About The System</title></head>
 
<body>
    
    
    <div class="page-subtitle">
        <p class="big-2" style="width:100%;"><strong>About this System</strong></p>
    </div>
        
    <div class="page-main-content">  
        <div class = "about_page aboutleft">   
            <img id = "danceImg" src = "../images/storageImage.jpg" height="100%"><br>
            
            <p style='font-size:11pt'>
                <?php      
                echo "Last Update: " . date ("F d Y.",filemtime("about.php"));           
            ?>
            </p>
        </div>
        
        <div class = "about_page aboutright">   
            <p>The Soil Sample Management System is designed to organize the soil samples in storage room and manage sample data in designed database. Users can add new data, update existing sample data and query sample data.</p>
            <br>
            
            <p>The image on the left is a diagram of the designed  storage room and corresponding storage hierarchy.</p>
        </div>
        
    </div>
</body>
    
</html>