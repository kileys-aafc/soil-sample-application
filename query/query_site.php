<html>
    <?php
    include '../nav-template.php';
    ?>

    
<head>    
    <title>Query Site Info</title>
</head>
    
    
<body>
    <div id = "querySite">
         <p class="big-2"><strong>Query Site Info</strong></p>  
<form action = "get_site_info.php" method="post">
    
    
        
       
    <p>What information do you know about the site?            
    <select name = "siteInfoField" style='width:200px;'>
        <option value = " ">-Please Select-</option>  
        
        <option value = "site_num"> Site Number</option>
        <option value = "site_name"> Site Name</option>
        <option value = "site_prov"> Province of Site</option>
        <option value = "all"> Show All Records</option>
    </select>   
    </p>  
 
    <p>It is (exact):
        <input  type = "text" name = "siteQueryAnswer" />
    </p>
    
    <p colspan="2" >
        <input type = "submit" value = "Submit Query"/>
    </p>
    
      
        
    

</form>
</div>
</body>
<style>
    
    input[type = text]{
        height:28pt;
        width: 200px;
        float: right;
    }
    
    select{
        height:28pt;
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
    
    #querySite{
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


</html>