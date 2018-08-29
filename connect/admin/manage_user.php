<html>
<?php
    include '../index.php';  
    include("../functions/redirect_homepage.php");
   
    include("../functions/check_admin.php");
    require '../dbConnect.php';
    check_admin();
?>
<head><title>Manage Users</title>
    
    <style>
  
    #add_user,#delete_user,#user_to_admin{
         font-size: 13pt;
        padding-left: 50px;
        line-height: 2.5; 
        width: 60%;
        float: left;
        border-bottom: 2pt solid #a9a633; 
        margin-left: 50px;

    }

    
   input[type = text], input[type = submit],select{
        height:28pt;
        width: 200px;
        float: right;
    }
       
    input[type = submit]{

        background: #a9a033;
        border-radius: 4px;
        border: 2pt solid #a9a633; 
        color:#373d38;
    }

</style>
    </head>
<body>


    
<form action = "manage_user_result.php" method = "post">  
     <div id="add_user">
         <p ><strong>Add a New User:</strong></p>  
         <p><small><i>User's information includes the username, password and ...</i></small></p> 

        <p>User Name:
        <input required type = "text" name = "add_username" size = "30" />
        </p>
        <p>Temprary Password:
        <input required type = "text" name = "add_password" size = "30" />
        </p>
         
         
          <p>User Type:
           <select  required name="add_admin" style='width:200px;'>
                <option value="">-Please Select-</option>
                 <option value = "1">Admin User</option>
                 <option value = "0">Non-Admin User</option>
            </select>
        </p>
         
         
        
        <p>
        <input type = "submit" name="add_user" value = "Add New User"/>
        </p>   
    </div>        
</form> 
    
<form action = "manage_user_result.php" method = "post">  
     <div id="delete_user">
         <p><strong>Delete an Existing User:</strong></p>  
         <p><small><i>User's information includes the username, password and ...</i></small></p> 

         <p>User Name:
         <input required type = "text" name = "delete_username" size = "30" />
         </p>
         
         <p>
         <input type = "submit" name="delete_user_submit" value = "Delete This User"/>
         </p>   
    </div>        
</form> 
    
    

    
</body>


</html>