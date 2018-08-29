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
<style>
  
    #delete-record{
         font-size: 13pt;
        padding-left: 50px;
        line-height: 2.5; 
        width: 60%;
        float: left;
        margin-left: 50px;    
    }
    
    p{
        width: 600px;
        padding-left: 10px;
    }
    
   input[type = text]{
        height:28pt;
        width: 200px;
        float: right;
    }
       
    input[type = submit]{
        padding:7px 18px;
         float: right;
        background: #a9a033;
        border-radius: 4px;
        border: 2pt solid #a9a633; 
        color:#373d38;
        margin: 10px; 
    }

</style>
           
<form action = "delete2.php" method = "post">  
 <div id="delete-record">
     <p class="big-2"><strong>Find The Sample to Delete</strong></p>  
     <p class="big-2" style="width:800px;"><small><i>Sample ID is the primary identification of a sample that does not change.</i></small></p> 
       
    <p>Sample ID.(exact):
    <input required type = "text" name = "idanswer" size = "30" />
    </p>
    
     <p>
        <input type = "submit" value = "Find This Sample"/>
     </p>
     
     
</div>        
</form> 
</body>


</html>