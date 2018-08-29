<?php include 'index.php';?>    

<main role="main" class="container">

<section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">CanSIS Soil Samples</h1>
          <p class="lead text-muted">This application allows you to query and manage the contents of the CanSIS Soil Sample Collection.</p>
          <!-- <p>
            Button to click <a href="#" class="btn btn-primary my-2">Main call to action</a> 
          </p>
          -->
        </div>
</section>

<div class="card-deck">
  <div class="card">    
        <i class="fas fa-search bg-secondary text-center text-light py-4" style="font-size: 1000%"></i>
  <div class="card-body">
      <h5 class="card-title">Search Database</h5>
      <p class="card-text">Query soil samples currently stored in the database.</p>
      <p><a class="btn btn-secondary" href="http://<?php echo $host ?>/soil/connect/query/querySample.php" role="button">View details</a></p>
    </div>
  </div>
  <div class="card">
  <i class="fas fa-qrcode bg-secondary text-center text-light py-4" style="font-size: 1000%"></i>
    <div class="card-body">
      <h5 class="card-title">Print Labels</h5>
      <p class="card-text">Print labels for storing soil samples in the warehouse.</p>
      <p><a class="btn btn-secondary" href="http://<?php echo $host ?>/soil/connect/label/create_label.php" role="button">View details</a></p>
    </div>
  </div>
  <div class="card">
  <i class="far fa-question-circle bg-secondary text-center text-light py-4" style="font-size: 1000%"></i>
    <div class="card-body">
      <h5 class="card-title">About the System</h5>
      <p class="card-text">Information about the database and warehouse storage.</p>
      <p><a class="btn btn-secondary" href="http://<?php echo $host ?>/soil/connect/about/about.php" role="button">View details</a></p>
    </div>
  </div>
</div>


   
</main>
</body>    
</html>