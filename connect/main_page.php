<html>
     <?php
        include 'index.php';
        ?>    
  
<head>
    
    <title>Soil Sample Management</title>
        
    <script type="text/javascript">
     
        function hideFunc(Content){ 
            var x=document.getElementById(Content);
            if(x.style.display==="none"){
                x.style.display="block";
            }else{
                x.style.display="none";
            }
        }    
    </script>    
</head>
    
    
<body>
    

<div class="homerow">
    <p class="big-1" style="padding-left:80px;">Welcome <?php   echo htmlspecialchars($_SESSION['username']);   ?>. </p>    
    <div class = "homepage homeleft">   
        
        <p><img src="../connect/images/SitesLocationP4.png" width="1000" height="500" alt="site image"></p>  
    </div>
    <div class="homepage homeright">
        <!---
	<button class="homebutton" onclick="hideFunc('hideIns')">Instruction</button>
        <div id = "hideIns">
            <p>About this System</p>
            <p>This soil management system is an integrated system that users can add, update and query the soil sample data in the database.</p>
        </div>  
        
        <button class="homebutton" onclick="hideFunc('hideIns2')">About</button>
        <div id = "hideIns2">
            <p>About this System</p>
            <p>This soil management system is an integrated system that users can add, update and query the soil sample data in the database</p>
            <p>This soil management system is an integrated system that users can add, update and query the soil sample data in the database</p>
        </div>
	--->
    </div>
    
     
</div>
    

 


</body>    
</html>