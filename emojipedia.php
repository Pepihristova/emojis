<?php 
session_start();

$user = $_SESSION['user'];
include "includes/db_connect.php";
$read_query = "SELECT * FROM emoji";
$images_result = mysqli_query($conn, $read_query);
?>

<section class="bg-light" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Portfolio</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
      </div>
    </div>
    <div class="row">
     <?php if(mysqli_num_rows($images_result) > 0){ ?>
      <?php while($row = mysqli_fetch_assoc($images_result)){ ?>
        <div class="col-lg-4 col-md-4 col-sm-6 portfolio-item"">
         <p>The string of this emoji is:</p>
          <img style="width: 20%;" class="img-fluid" src="uploads/<?= $row['image_emoji'] ?>" 
          <div class="portfolio-caption">
            <p>The string of this emoji is:</p>
            <h4><?= $row['string'] ?></h4>
            <p>If you want to use it, copy it</p>
          </div>
        </div> 
      <?php } ?>  
    <?php } ?>  
  </div>
</div>
</section>
<center><p><a class="btn btn-default" href="new_message.php">Add a new message</a></p></center>
  


