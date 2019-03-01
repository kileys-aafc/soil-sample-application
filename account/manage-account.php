<head><title>Change Account Password</title></head>
<?php include '../nav-template.php'; ?>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    var check=function(){
        if(document.getElementById('password').value == document.getElementById('confirm_password').value){
            document.getElementById('message').className="text-success";
            document.getElementById('message').innerHTML="Passwords Match";
            document.getElementById('updatePassword').disabled=false;   
        }
        else{
            document.getElementById('message').className="text-danger";
            document.getElementById('message').innerHTML="Passwords don't match!";
            document.getElementById('updatePassword').disabled=true;   
        }
    }
</script>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center mb-4">Change Password</h1>
            <hr class="mb-4">
        </div>
    </div>
</div>           
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-4">
            <form action="password-changed.php" method="post">
                <div class="form-group"> 
                    <p>Username: <strong><?php echo  $_SESSION['username'] ?></strong></p>
                    <label for="password">New Password:</label>
                    <input class="form-control" required type="password" name="password"  id="password" value="">
                </div>    
                <div class="form-group">
                    <label for="confirm_password">Re-type Password:</label>
                    <input class="form-control" required type="password" name="confirm_password"  value=""   id="confirm_password" onkeyup="check();">
                </div>             
            <p><span class="" id="message"></span></p>
            <input class="btn btn-primary mt-2" type="submit" name="updatePassword" id="updatePassword" value="Update Now">
            
            </form>
        </div>
    </div>
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
</main>      
</body>   
</html>
