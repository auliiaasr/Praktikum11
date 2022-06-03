<?php
if (isset($_POST['search'])) :
  require_once 'connect.php';
  $search = $_POST['search'];

  $query = mysqli_query($conn, "SELECT * FROM film WHERE title LIKE '%" . $search . "%'");
  while ($row = mysqli_fetch_object($query)) :
?>
    <div class="col-sm-3 mb-3">
      <div class="card" style="width: 15rem">
        <img src="https://altfilmlens.files.wordpress.com/2015/11/the_good_dinosaur_promo_art_03.jpg" class="card-img-top" alt="" />
        <div class="card-body">
          <h5 class="card-title"><?= $row->title; ?> (<?= $row->release_year; ?>)</h5>
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start">
              <p class="card-text">Rating: <?= $row->rating; ?></p>
            </div>
            <div class="d-flex justify-content-end">
              <i class="fas fa-edit fa-lg text-primary mr-1"></i>
              <i class="fas fa-trash-alt fa-lg text-danger"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  endwhile;
endif;
?>