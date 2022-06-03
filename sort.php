<?php
if (isset($_POST['sort'])) :
    require_once 'connect.php';
    $sort = $_POST['sort'];

    $query = mysqli_query($conn, "SELECT * FROM film ORDER BY title " . $sort . "");
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
                            <!-- Button Edit -->
                            <div class="col-2">
                                <a href="edit.php?id=<?= $row->film_id ?>">
                                    <i class="fas fa-edit fa-lg text-primary mr-1"></i>
                                </a>
                            </div>
                            <!-- Button Delete -->
                            <div class="col-2">
                                <a href="delete.php?id=<?= $row->film_id ?>">
                                    <i class="fas fa-trash-alt fa-lg text-danger"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
?>