<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AULIA SINTA_1122</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0d95b64c38.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #242424">
    <!-- Title -->
    <div class="my-3">
        <h1 class="text-light text-center">CINEPOLIS MOVIES</h1>
    </div>
    <div class="container">
        <!-- Content -->
        <div class="row">
            <?php
            require_once 'connect.php';
            $id = $_GET['id'];
            $query = mysqli_query($conn, "SELECT * FROM film INNER JOIN language ON film.language_id = language.language_id WHERE film_id=$id");
            $row = mysqli_fetch_object($query);
            ?>
            <!-- Image -->
            <div class="col-3">
                <img src="https://altfilmlens.files.wordpress.com/2015/11/the_good_dinosaur_promo_art_03.jpg" class="card-img-top" alt="" />
            </div>
            <!-- Overview -->
            <div class="col-9 text-white">
                <h2><?= $row->title; ?> (<?= $row->release_year; ?>)</h2>
                <div class="d-flex justify-content-start">
                    <span class="badge my-auto me-2 bg-light text-dark"><?= $row->rating; ?></span>
                    <h6 class="my-auto me-2"><?= $row->special_features; ?></h6>
                    <h2 class="mb-1 me-2">&#183;</h2>
                    <h6 class="my-auto me-2"><?= $row->length; ?> min</h6>
                </div>
                <h3 class="mt-5">Overview</h3>
                <p><?= $row->description; ?></p>
                <div class="row">
                    <div class="col">
                        <h5>Language</h5>
                        <p><?= $row->name; ?></p>
                    </div>
                    <div class="col">
                        <h5>Rental Duration</h5>
                        <p><?= $row->rental_duration; ?> days</p>
                    </div>
                    <div class="col">
                        <h5>Rental Rate</h5>
                        <p>$ <?= $row->rental_rate; ?></p>
                    </div>
                    <div class="col">
                        <h5>Replacement Cost</h5>
                        <p>$ <?= $row->replacement_cost; ?></p>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 mt-4">
                <a href="index.php" class="btn btn-light" type="button"><i class="fas fa-arrow-circle-left me-1"></i> Back</a> 
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>