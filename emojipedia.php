<?php 
session_start();
echo $_SESSION['image'];

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
        <div class="col-md-4 col-sm-6 portfolio-item">
          <img class="img-fluid" src="uploads/<?= $row['image_emoji'] ?>" alt="">
          <div class="portfolio-caption">
            <h4><?= $row['user'] ?></h4>
            <p class="text-muted"><a href="download_image.php?image=<?= $row['image_emoji'] ?>">Click to download</a></p>
            <?php 
            	if ($row['user']==$user) {
            		echo ""
            		?> <p class="text-muted"><a href="delete.php?id=<?=$row['id']?>">Delete</a></p>
             <?php 
            	}
             ?>
          </div>
        </div> 
      <?php } ?>  
    <?php } ?>  
  </div>
</div>
</section>


