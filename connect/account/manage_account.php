<html>
<?php
    include '../index.php';  
?>
<head><title>Change Password</title>
    <style>
    
    
    
    input[type = text], input[type = submit]{
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
 
   #apply_to_admin,#change_password{
        font-size: 13pt;
        padding-left: 50px;
        line-height: 2.5; 
        width: 60%;
        float: left;
        /*
        border-bottom: 2pt solid #a9a633; 
        */
        margin-left: 50px;

    }
        p{
            padding-left: 10px;
            width: 700px;
        }
    
</style>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        var check=function(){
            if(document.getElementById('password').value == document.getElementById('confirm_password').value){
                document.getElementById('message').style.color='green';
                document.getElementById('message').innerHTML="Password Match.";
                document.getElementById('updatePassword').disabled=false;   

            }else{
                document.getElementById('message').style.color='red';
                document.getElementById('message').innerHTML="Passwords Not Match.";
                document.getElementById('updatePassword').disabled=true;   
            }
        }
    </script>
</head>

  
<body>
        
    <div id="change_password" style="width:60%;">
        <p class="big-2"><strong>Change Password</strong></p>

        <form action = "password_changed.php" method = "post"> 
    
                <p>Your Username:
                <input required type ="text" value = "<?php echo  $_SESSION['username'] ?>" readonly="readonly" />
                </p>

                <p>New Password:
                <input required type ="text" name="password"  id="password" value = "" />
                </p>

                <p>Re-type New Password:
                <input required type ="text" name="confirm_password"  value = ""   id="confirm_password" onkeyup="check();"/>
            </p>
            
               
        
        <p>
            <input type = "submit" name = "updatePassword" id="updatePassword" value = "Update Now"/>           
        </p>
            <p>
                <span id="message"></span>
            </p>
        </form>
    </div>
    
   
    <?php
            if($_SESSION['admin']==0){
               
                echo '
        

               <div id="apply_to_admin">
                    <p><strong>Apply as Admin</strong></p>
                    <p> As an admin user, you have more privilege to </p>
                    <p>Please contact the administrator.<p>
           </div>';
          }
    ?>
      
</body>   
</html>
