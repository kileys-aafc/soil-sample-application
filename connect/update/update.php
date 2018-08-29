<html>
<?php
    include '/var/www/html/soil/connect/index.php';
?>

<head><title>Update Sample</title></head>
<body>
<style>

    #update1-sample{
        padding-left: 50px;
        line-height: 2.5; 
        width: 60%;
        float: left;
        margin-left: 50px;
    }
    
    p{
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
           
<form action = "update2.php" method = "post">  
    <div id="update1-sample">
        <p class="big-2">
            <strong>Find The Sample to Update</strong>
        </p> 
    
        <p style="width:700px;">
            <small><i>Sample ID is the primary identification of a sample that does not change.</i></small>
        </p>
  
       
        <p style="width:600px;">Sample ID.(exact):
            <input required type = "text" name = "idanswer" size = "30" />
        </p>

        <p style="width:600px;">
            <input type = "submit" value = "Update This Sample"/>
        </p>
     
    </div>
       
</form> 
</body>


</html>