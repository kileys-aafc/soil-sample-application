<head><title>Manage User Accounts</title>
<?php
    include '../nav-template.php';  
    include("../functions/redirect_homepage.php");
   
    include("../functions/check_admin.php");
    require '../dbConnect.php';
    check_admin();
?>

<div class="container">
    <div class="row justify-content-center">
        <h1 class="display-4">Manage Users</h1>
    </div>
    <hr class="mb-4"> 
    <div class="row justify-content-center">
        <div class="col-4">
            <h5 class="mb-4"><strong>Create New User</strong></h5>
            <form action="manage_user_result.php" method="post">  
                <div class="form-group">  
                    <label for="add_username">Username</label>
                    <input class="form-control" required type="text" name="add_username" />
                </div>
                <div class="form-group">
                    <label for="add_password">Temporary Password</label>
                    <input class="form-control" required type="text" name="add_password" />
                </div>
                <div class="form-group">
                    <label for="add_admin">User Privileges</label>
                    <select class="form-control" required name="add_admin">
                        <option value="" hidden placeholder="Please Select"></option>
                        <option value = "1">Admin</option>
                        <option value = "0">Non-Admin</option>
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" name="add_user" value="Add New User"/>   
            </form>
        </div>
        <div class="col-4" id="delete_user">
            <h5 class="mb-4"><strong>Delete User</strong></h5>  
            <form action = "manage_user_result.php" method = "post">  
                <div class="form-group">  
                    <label for="delete_username">Username</label>
                    <input class="form-control" required type="text" name="delete_username" />
                </div>
                <input class="btn btn-danger" type="submit" name="delete_user_submit" value="Delete User" />
            </form>
        </div>        
        
    </div> 
</div>    
</body>
</html>