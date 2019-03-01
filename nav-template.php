<!doctype html>
<html lang="en">
  <?php
      //--------------[localhost]
      $host= $_SERVER['SERVER_NAME']; 
      //-------------[/var/www/html]   
      $root= $_SERVER['DOCUMENT_ROOT'];
    
      session_start();
    
      if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
          header("location:http://".$host."/login.php");
          exit;
      }
  ?>

  <head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/images/soil-filled.png">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/site-template.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/index.php"><img src="/images/soil-white.png" width="30" height="30" alt=""> Home</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarsExampleDefault" style="">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">         
            <a class="nav-link" href="/scan/scan-sample.php">Scan Sample</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Samples</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="/add/add-sample.php">Add Sample</a>
              <a class="dropdown-item" href="/add/add-project.php">Add Project</a>
              <a class="dropdown-item" href="/add/add-location.php">Add Location</a>
              <a class="dropdown-item" href="/update/update-sample.php">Update Sample</a>
              <a class="dropdown-item" href="/update/update-project.php">Update Project</a>
              <a class="dropdown-item" href="/update/update-location.php">Update Location</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="/about/info.php">Storage System</a>
              <a class="dropdown-item" href="/about/data-structure.php">Database Structure</a>
              <a class="dropdown-item" href="/about/contact.php">Contact Admin</a>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/account/manage-account.php">Manage Account</a>
          </li>
          
          <!-- ADMIN FUNCTION -->
          <?php
            if($_SESSION['admin']==1){
              echo'
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">    
                        <a class="dropdown-item" href="/admin/manage-users.php">Manage Users</a>
                        <a class="dropdown-item" href="/admin/delete-sample.php">Delete Sample</a>
                    </div>
                </li>';
            }
          ?>
          <!--ADMIN FUNCTION END -->

          <li class="nav-item">
              <a class="nav-link" href="/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Bootstrap core JavaScript ================================ -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  

