<html>
<?php
    include '../index.php';  
?>
<head><title>Create Label</title></head>
<body>
<style>
  
    #create-label-query{
        padding-left: 50px;
        line-height: 2.5; 
        width: 60%;
        float: left;
        margin-left: 50px;
    }
    
    p{
        padding-left: 10px;
        width: 600px;
    }
    
   
    

</style>
           
<form action = "individualLabel.php" method = "post"> 
    <div id="create-label-query">
        <p class="big-2"><strong>Find The Sample to Delete</strong></p>  
        
 
     
       
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