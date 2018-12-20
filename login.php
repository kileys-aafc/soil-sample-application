<?php
    include("db-connect.php");
    session_start();

    $username=$password="";
    $username_err=$password_err="";
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        //username & password sent from form


        ////////-------------------check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err="Please enter username.";
        }else{
            $username=trim($_POST['username']);
        }

        ////////-------------------check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err="Please enter password.";
        }else{
            $password=trim($_POST['password']);
        }


        if(empty($username_err)&&empty($password_err)){
            $sqlLogin="SELECT username,password,admin FROM users WHERE username=?";
            
            if($stmtLogin=mysqli_prepare($dbc,$sqlLogin)){
                mysqli_stmt_bind_param($stmtLogin,"s",$param_username);
                $param_username=$username;
                if (mysqli_stmt_execute($stmtLogin)){
                    mysqli_stmt_store_result($stmtLogin);
                    
                    if(mysqli_stmt_num_rows($stmtLogin)==1){
                        mysqli_stmt_bind_result($stmtLogin,$username,$hashed_password,$admin);
                        if(mysqli_stmt_fetch($stmtLogin)){
                            if($password==$hashed_password){
                                //passrod is correct. Start a new session and save the suername to the session
                                session_start();
                                $_SESSION['username']=$username;
                                $_SESSION['admin']=$admin;
                                header("location:index.php");
                            }else{
                                $password_err="The password you entered is not valid.";
                            }
                        }else{
                            echo "System error. Please contact the administrator.</br>
                            Error Code: Not Fetch.";
                        }
                    }else{
                        $username_err="Username does not exist.";
                    }
                }else{
                    echo "Oops! Something went wrong with dataabse. Please try again later.";
                }
            }else{
                echo "System error. Please contact the administrator.</br>
                            Error Code: Not Prepare.";
            }
            mysqli_stmt_close($stmtLogin);
        }
        mysqli_close($dbc);
       
    }
?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="icon" href="images/soil-filled.png">

    <title>CanSIS Archive Sign In</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    
  
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <img class="mb-4" src="images/soil.png" alt="" width="80" height="80">       
      <h1 class="h3 mb-3 font-weight-normal">CanSIS Sample Archive</h1>

      <label for="inputUser" class="sr-only" >Username</label>
      <input id="inputUser" name="username" class="form-control" placeholder="Username" required=""  value="<?php echo $username;?>" autofocus="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;" autocomplete="off" type="text">
      
      <label for="inputPassword" class="sr-only">Password</label>
      <input id="inputPassword" name= "password" class="form-control" placeholder="Password" required=""  value="<?php echo $password;?>" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" autocomplete="off" type="password">
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-0 mb-3 text-muted"><?php echo $username_err."</br>".$password_err;?></p>
      <p class="mt-5 mb-3 text-muted">For assistance <a href="mailto:simon.kiley@canada.ca?Subject=Soil%20Sample%20Application%20Assistance%20Required" target="_top">Contact Us</a></p>
    </form>
    
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body></html>